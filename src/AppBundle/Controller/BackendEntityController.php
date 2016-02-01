<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @Route("/backend/entity")
 */
class BackendEntityController extends Controller
{
    /**
     * @Route("", name="backend_entity_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('backend/index.html.twig', [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/{entityCode}/list", name="backend_entity_list", defaults={"entityCode" = "news"})
     */
    public function listAction(Request $request, $entityCode)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $this->getDoctrine()
                         ->getRepository($this->getRepositoryLogicalName($entityCode))
                         ->createQueryBuilder('e')
                         ->select('e')
                         ->getQuery()
                         ->getResult();
        
                 \Symfony\Component\VarDumper\VarDumper::dump($this->get('annotations')->fillProperties($entityCode, $entities));
                 die();
        
        return $this->render('backend/entity/list.html.twig', array(
            'entityCode' => $entityCode,
            'entities' => $this->get('annotations')->fillProperties($entityCode, $entities),
        ));
    }
    

    /**
     * @Route("/{entityCode}/{id}/history", name="backend_entity_history", defaults={"entityCode" = "news"})
     */
    public function historyAction(Request $request, $entityCode, $id)
    {
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        $em = $this->getDoctrine()->getManager();

        // запись
        $entity = $em->getRepository($this->getRepositoryLogicalName($entityCode))->find($id);
        // история записи
        $histories = $em->getRepository($this->getRepositoryLogicalName('History'))->findBy([
          'entity' => $entityCode,
          'entryId'=> $id
        ]);

        //крошки
        $breadcrumbs->addItem(
                $translator->trans($this->getEntityTitle($entityCode), [], 'global'),
                $this->get("router")->generate("backend_entity_list", ['entityCode' => $entityCode]));
        $breadcrumbs->addItem($entity,$this->get("router")->generate("backend_entity_show", ['id' => $id ]));
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
     * @Route("/{entityCode}/new", name="backend_entity_new", defaults={"entityCode" = "news"})
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $entityCode)
    {
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        $entity     = $this->createNewEntity($entityCode);
        $entityType = $this->getEntityTypeNamspace($entityCode);
        
        $form = $this->createForm($entityType, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->addFlash('alert-success', $translator->trans('A new entry is added!', [], 'messages'));

            return $this->redirectToRoute('backend_entity_show', [
                'entityCode' => $entityCode,
                'id' => $entity->getId()
            ]);
        }

        //крошки
        $breadcrumbs->addItem(
                $translator->trans($this->getEntityTitle($entityCode), [], 'global'),
                $this->get("router")->generate("backend_entity_list", ['entityCode' => $entityCode]));
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
     * @Route("/{entityCode}/{id}/show", name="backend_entity_show", defaults={"entityCode" = "news"})
     * @Method("GET")
     */
    public function showAction(Request $request, $entityCode, $id)
    {
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        $entity = $this->getDoctrine()
                       ->getRepository($this->getRepositoryLogicalName($entityCode))
                       ->find($id);

        // крошки
        $breadcrumbs->addItem(
                $translator->trans($this->getEntityTitle($entityCode), [], 'global'),
                $this->get("router")->generate("backend_entity_list", ['entityCode' => $entityCode]));
        $breadcrumbs->addItem($entity);
        $breadcrumbs->addItem($translator->trans('Viewing', [], 'backend'));
        
        // рендер
        return $this->render('backend/entity/show.html.twig', array(
            'entityCode' => $entityCode,
            'entity' => $this->get('annotations')->fillOneProperties($entityCode, $entity),
            'delete_form' => $this->createDeleteForm($entity, $entityCode)->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing News entity.
     *
     * @Route("/{entityCode}/{id}/edit", name="backend_entity_edit", defaults={"entityCode" = "news"})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $entityCode, $id)
    {
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        //запись
        $entity = $this->getDoctrine()
                       ->getRepository($this->getRepositoryLogicalName($entityCode))
                       ->find($id);

        //крошки
        $breadcrumbs->addItem(
                $translator->trans($this->getEntityTitle($entityCode), [], 'global'),
                $this->get("router")->generate("backend_entity_list", [ 'entityCode' => $entityCode ]));
        $breadcrumbs->addItem($entity,  $this->get("router")->generate("backend_entity_show", [ 'id' => $id ]));
        $breadcrumbs->addItem($translator->trans('Editing', [], 'backend'));

        //
        $deleteForm = $this->createDeleteForm($entity, $entityCode);
        //
        $editForm = $this->createForm($this->getEntityTypeNamspace($entityCode), $entity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->addFlash('alert-success', $translator->trans('Record updated!', [], 'messages'));

            return $this->redirectToRoute('backend_entity_edit', array('entityCode'=>$entityCode, 'id' => $entity->getId()));
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
     * @Route("/{entityCode}/{id}", name="backend_entity_delete", defaults={"entityCode" = "news"})
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $entityCode, $id)
    {
        $entity = $this->getDoctrine()
                       ->getRepository($this->getRepositoryLogicalName($entityCode))
                       ->find($id);

        $form = $this->createDeleteForm($entity, $entityCode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirectToRoute('backend_entity_list', ['entityCode'=>$entityCode]);
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
            ->setAction($this->generateUrl('backend_entity_delete', [
                'entityCode'=>$entityCode,
                'id' => $entity->getId()
            ]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * ########################################
     * ############    STAFF   ################
     * ########################################
     *
     */
    private function getRepositoryLogicalName($entityCode)
    {
        $utils = $this->container->get('utils');
        $entityCode = $utils->getCamelCase($entityCode);

        return "AppBundle:" . $entityCode;
    }

    private function getEntityTypeNamspace($entityCode)
    {
        $utils = $this->container->get('utils');
        $entityCode = $utils->getCamelCase($entityCode);

        return 'AppBundle\\Form\\' . $entityCode . 'Type';
    }

    private function createNewEntityType($entityCode)
    {
        $utils = $this->container->get('utils');
        $entityCode = $utils->getCamelCase($entityCode);

        $class = 'AppBundle\\Form\\' . $entityCode . 'Type';

        return new $class;
    }

    private function getEntityNamspace($entityCode)
    {
        $utils = $this->container->get('utils');
        $entityCode = $utils->getCamelCase($entityCode);

        return 'AppBundle\\Entity\\' . $entityCode;
    }


    private function createNewEntity($entityCode)
    {
        $utils = $this->container->get('utils');
        $entityCode = $utils->getCamelCase($entityCode);

        $class = 'AppBundle\\Entity\\' . $entityCode;

        return new $class;
    }

    private function getEntityTitle($entityCode)
    {
        $utils = $this->container->get('utils');
        $entityCode = $utils->getCamelCase($entityCode);

        $title = $entityCode;

        //аннотации
        $annotations = $this->get('annotations')->getAll($entityCode);

        if(isset($annotations['object']['data']) && is_object($annotations['object']['data']))
        {
            $title = $annotations['object']['data']->getTitle();
        }

        return $title;

    }
}
