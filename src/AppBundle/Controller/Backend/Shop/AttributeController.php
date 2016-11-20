<?php

namespace AppBundle\Controller\Backend\Shop;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Query;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\HttpFoundation\FileBag;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Description of ShopController
 *
 * @author busaev
 * @Route("/backend/shop/attribute")
 */
class AttributeController extends Controller 
{
    /**
     * Creates a new News entity.
     *
     * @Route("/new", name="backend_shop_attribute_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        //службы
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $entities    = $this->get("app.entities");
        
        $entityCode  = 'attribute';
        
        $currentEntity = $entities->$entityCode;
        
        $entity = $currentEntity->init();
        
        $form = $this->createForm($currentEntity->getTypeNamspace(), $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {   
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->addFlash('alert-success', $translator->trans('A new entry is added!', [], 'messages'));

            return $this->redirectToRoute('backend_content_entry', ['entityCode' => $entityCode]);
        }
        
        //крошки
        $breadcrumbs->addItem($translator->trans($currentEntity->getTitle(), [], 'global'), $this->get("router")->generate("backend_content_entry", ['entityCode' => $entityCode]));
        $breadcrumbs->addItem($translator->trans('Creating', [], 'global'));
        
        return $this->render('backend/modules/shop/attribute/new.html.twig', array(
            'entityCode' => $entityCode,
            'entity'     => $entity,
            'annotations'=> $this->get('annotations')->fillOneProperties($entityCode, $entity),
            'form'       => $form->createView(),
        ));
    }
    

    /**
     * Displays a form to edit an existing News entity.
     *
     * @Route("/{id}/edit", name="backend_shop_attribute_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $entities    = $this->get("app.entities");
        
        $entityCode = 'attribute';
        
        $currentEntity = $entities->$entityCode;
        
        //запись
        $entity = $this->getDoctrine()->getRepository($currentEntity->getLogicalName())->find($id);
        
        //крошки
        $breadcrumbs->addItem($translator->trans($currentEntity->getTitle(), [], 'global'),$this->get("router")->generate("backend_content_entry", [ 'entityCode' => $entityCode ]));
        $breadcrumbs->addItem($entity,  $this->get("router")->generate("backend_module_entry_show", [ 'id' => $id, 'entityCode' => $entityCode]));
        $breadcrumbs->addItem($translator->trans('Editing', [], 'global'));

        
        $originalValues = new ArrayCollection();

        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($entity->getValues() as $value) {
            $originalValues->add($value);
        }

        //
        $deleteForm = $this->createDeleteForm($entity, $entityCode);
        
        //
        $editForm = $this->createForm($currentEntity->getTypeNamspace(), $entity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            
            // remove the relationship between the Value and the Attribute
            foreach ($originalValues as $value) {
                if (false === $entity->getValues()->contains($value)) {
                    // remove the Task from the Tag
                    $value->setAttribute(null);

                    $em->persist($value);

                    // if you wanted to delete the Value entirely, you can also do that
                     $em->remove($value);
                }
            }
            
            $em->persist($entity);
            $em->flush();
            
            $this->addFlash('alert-success', $translator->trans('Record updated!', [], 'messages'));

            return $this->redirectToRoute('backend_shop_attribute_edit', array('id' => $entity->getId()));
        }

        return $this->render('backend/modules/shop/attribute/edit.html.twig', array(
            'entityCode'=>$entityCode,
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
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
            ->setAction($this->generateUrl('backend_content_entry_delete', [
                'entityCode'=>$entityCode,
                'id' => $entity->getId()
            ]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
