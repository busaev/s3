<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Query;
use Symfony\Component\VarDumper\VarDumper;

use AppBundle\Entity\ContentBaseEntity;

/**
 * @Route("/backend/module/entry")
 */
class ModuleEntryController extends Controller
{
    /**
     * @Route("/{entityCode}", 
     *        name="backend_module_entry", 
     *        defaults={"entityCode" = "news"}, 
     *        options={"expose"=true})
     */
    public function indexAction(Request $request, $entityCode)
    {   
        $utils  = $this->get('utils');
        
        $status = $this->getDoctrine()
                       ->getRepository("AppBundle:ScrollItem")
                       ->findByScrollItemCodeAndScrollCode('delete', 'entry_status');

        // Основной запрос
        $query = $this->getDoctrine()
                ->getRepository($utils->getRepositoryLogicalName($entityCode))
                ->createQueryBuilder('e')
                ->select('e')
                ->where('e.entryStatus != :status')
                ->setParameter('status', $status->getId());
        
        // Если есть фильтр
        $param = $request->query->get('param');        
        if(null !== $param)
        {
            foreach($param as $key => $value)
            {
                $query->andWhere("e.{$key} = :{$key}");
                $query->setParameter($key, $value);
            }
        }    
        
        // Если нужен json
        if('json' == $format)
        {
            return new JsonResponse($query->getQuery()->getResult(Query::HYDRATE_ARRAY));
        }
        
        return $this->render('backend/entity/list.html.twig', array(
            'entityCode' => $entityCode,
            'entities'   => $this->get('annotations')->fillProperties($entityCode, $query->getQuery()->getResult()),
        ));
    }
    

    /**
     * @Route("/{entityCode}/{id}/history", name="backend_module_entry_history", defaults={"entityCode" = "news"})
     */
    public function historyAction(Request $request, $entityCode, $id)
    {
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $utils       = $this->get('utils');

        $em = $this->getDoctrine()->getManager();

        // запись
        $entity = $em->getRepository($utils->getRepositoryLogicalName($entityCode))->find($id);
        // история записи
        $histories = $em->getRepository($utils->getRepositoryLogicalName('History'))->findBy([
          'entity' => $entityCode,
          'entryId'=> $id
        ]);

        //крошки
        $breadcrumbs->addItem(
                $translator->trans($utils->getEntityTitle($entityCode), [], 'global'),
                $this->get("router")->generate("backend_module_entry", ['entityCode' => $entityCode]));
        $breadcrumbs->addItem($entity,$this->get("router")->generate("backend_module_entry_show", ['id' => $id ]));
        $breadcrumbs->addItem($translator->trans('History', [], 'backend'));

        //рендер
        return $this->render('backend/entity/history.html.twig', array(
            'entityCode' => $entityCode,
            'entity'     => $this->get('annotations')->fillOneProperties($entityCode, $entity),
            'histories'  => $this->get('annotations')->fillProperties('History', $histories),
        ));
    }

    
    /**
     * Creates a new News entity.
     *
     * @Route("/{entityCode}/new", name="backend_module_entry_new", defaults={"entityCode" = "news"})
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $entityCode)
    {
        //службы
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $utils       = $this->get("utils");
        $modules     = $this->get("app.entities");
        
        $entity      = $utils->createNewEntity($entityCode);
        $entityType  = $utils->getEntityTypeNamspace($entityCode);
        
        //если это базовый контент - пропускаем объект через модуль
        if($entity instanceof ContentBaseEntity)
        {
            $module = $modules->$entityCode;
            $entity = $module->init($entity);
        }
        
        $form = $this->createForm($entityType, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->addFlash('alert-success', $translator->trans('A new entry is added!', [], 'messages'));

            return $this->redirectToRoute('backend_module_entry_show', [
                'entityCode' => $entityCode,
                'id' => $entity->getId()
            ]);
        }

        //крошки
        $breadcrumbs->addItem(
                $translator->trans($utils->getEntityTitle($entityCode), [], 'global'),
                $this->get("router")->generate("backend_module_entry", ['entityCode' => $entityCode]));
        $breadcrumbs->addItem($translator->trans('Creating', [], 'backend'));
        
        return $this->render('backend/entity/new.html.twig', array(
            'entityCode' => $entityCode,
            'entity'     => $entity,
            'annotations'=> $this->get('annotations')->fillOneProperties($entityCode, $entity),
            'form'       => $form->createView(),
        ));
    }

    
    /**
     * Finds and displays a News entity.
     *
     * @Route("/{entityCode}/{id}/show", name="backend_module_entry_show", defaults={"entityCode" = "news"})
     * @Method("GET")
     */
    public function showAction(Request $request, $entityCode, $id)
    {
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $utils       = $this->get('utils');

        $entity = $this->getDoctrine()
                       ->getRepository($utils->getRepositoryLogicalName($entityCode))
                       ->find($id);

        // крошки
        $breadcrumbs->addItem(
                $translator->trans($utils->getEntityTitle($entityCode), [], 'global'),
                $this->get("router")->generate("backend_module_entry", ['entityCode' => $entityCode]));
        $breadcrumbs->addItem($entity);
        $breadcrumbs->addItem($translator->trans('Viewing', [], 'backend'));
        
        // рендер
        return $this->render('backend/entity/show.html.twig', array(
            'entityCode' => $entityCode,
            'entity' => $entity,
            'annotations' => $this->get('annotations')->fillOneProperties($entityCode, $entity),
            'delete_form' => $this->createDeleteForm($entity, $entityCode)->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing News entity.
     *
     * @Route("/{entityCode}/{id}/edit", name="backend_module_entry_edit", defaults={"entityCode" = "news"})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $entityCode, $id)
    {
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $utils       = $this->get('utils');

        //запись
        $entity = $this->getDoctrine()
                       ->getRepository($utils->getRepositoryLogicalName($entityCode))
                       ->find($id);

        //крошки
        $breadcrumbs->addItem(
                $translator->trans($utils->getEntityTitle($entityCode), [], 'global'),
                $this->get("router")->generate("backend_module_entry", [ 'entityCode' => $entityCode ]));
        $breadcrumbs->addItem($entity,  $this->get("router")->generate("backend_module_entry_show", [ 'id' => $id ]));
        $breadcrumbs->addItem($translator->trans('Editing', [], 'backend'));

        //
        $deleteForm = $this->createDeleteForm($entity, $entityCode);
        //
        $editForm = $this->createForm($utils->getEntityTypeNamspace($entityCode), $entity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->addFlash('alert-success', $translator->trans('Record updated!', [], 'messages'));

            return $this->redirectToRoute('backend_module_entry_edit', array('entityCode'=>$entityCode, 'id' => $entity->getId()));
        }

        return $this->render('backend/entity/edit.html.twig', array(
            'entityCode'=>$entityCode,
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Deletes a News entity.
     *
     * @Route("/{entityCode}/{id}/delete/soft", name="backend_module_entry_delete_soft")
     * @Method("GET")
     */
    public function deleteSoftAction(Request $request, $entityCode, $id)
    {
        $translator = $this->get('translator');
        $utils      = $this->get('utils');
        
        $status = $this->getDoctrine()
                       ->getRepository("AppBundle:ScrollItem")
                       ->findByScrollItemCodeAndScrollCode('delete', 'entry_status');

        //запись
        $entity = $this->getDoctrine()
                       ->getRepository($utils->getRepositoryLogicalName($entityCode))
                       ->find($id);
        
        $em = $this->getDoctrine()->getManager();
        $entity->setEntryStatus($status);
        $em->persist($entity);
        $em->flush();
        
        $this->addFlash('alert-success', $translator->trans('Record deleted!', [], 'messages'));               

        return $this->redirectToRoute('backend_module_entry', ['entityCode'=>$entityCode]);
    }

    /**
     * Deletes a News entity.
     *
     * @Route("/{entityCode}/{id}", name="backend_module_entry_delete", defaults={"entityCode" = "news"})
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $entityCode, $id)
    {
        $utils  = $this->get('utils');
        
        $entity = $this->getDoctrine()
                       ->getRepository($utils->getRepositoryLogicalName($entityCode))
                       ->find($id);

        $form = $this->createDeleteForm($entity, $entityCode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirectToRoute('backend_module_entry', ['entityCode'=>$entityCode]);
    }

    /**
     * Creates a form to delete a News entity.
     *
     * @param News $entity The News entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($entity, $entityCode)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('backend_module_entry_delete', [
                'entityCode'=>$entityCode,
                'id' => $entity->getId()
            ]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
