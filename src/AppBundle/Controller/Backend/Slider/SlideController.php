<?php

namespace AppBundle\Controller\Backend\Slider;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Module\SliderBundle\Entity\Modules\Slider;
use Module\SliderBundle\Entity\Modules\Slide;
use Module\SliderBundle\Form\SliderType;

/**
 * Slide controller.
 *
 * @Route("/backend/slide")
 */
class SlideController extends Controller
{

    /**
     * Lists all Slide entities.
     *
     * @Route("/show/table", name="backend_slide_table")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ModuleSliderBundle:Slide')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Displays a form to create a new Slide entity.
     *
     * @Route("/new", name="backend_slide_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new Slide();
        $form   = $this->createCreateForm($entity);

        return array(
            'entityCode' => 'slider',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    /**
     * Creates a new Slide entity.
     *
     * @Route("", name="backend_slide_create")
     * @Method("POST")
     * @Template("ModuleSliderBundle:Slide:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Slide();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setCreator($this -> getUser());
            $entity->setEditor($this -> getUser());            
            $entity->setCreatedAt(new \DateTime());
            $entity->setEditedAt(new \DateTime());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backend_slide_show', array('id' => $entity->getId())));
        }

        return array(
            'entityCode' => 'slider',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Slide entity.
     *
     * @param Slide $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Slide $entity)
    {
        $form = $this->createForm(new SlideType(), $entity, array(
            'action' => $this->generateUrl('backend_slide_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Finds and displays a Slide entity.
     *
     * @Route("/{id}", name="backend_slide_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModuleSliderBundle:Slide')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slide entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Slide entity.
     *
     * @Route("/{id}/edit", name="backend_slide_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModuleSliderBundle:Slide')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slide entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Slide entity.
    *
    * @param Slide $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Slide $entity)
    {
        $form = $this->createForm(new SlideType(), $entity, array(
            'action' => $this->generateUrl('backend_slide_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array(
                'label' => 'Изменить',
                'attr' => [
                    'class'   => "tiny  button"
                ]
                ));

        return $form;
    }
    /**
     * Edits an existing Slide entity.
     *
     * @Route("/{id}", name="backend_slide_update")
     * @Method("PUT")
     * @Template("ModuleSliderBundle:Slide:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModuleSliderBundle:Slide')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slide entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('backend_slide_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Slide entity.
     *
     * @Route("/{id}", name="backend_slide_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ModuleSliderBundle:Slide')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Slide entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backend_slide'));
    }

    /**
     * Creates a form to delete a Slide entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('backend_slide_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array(
                'label' => 'Удалить',
                'attr' => [
                    'onclick' => "return confirm('Вы уверены, что хотите удалить запись?')",
                    'class'   => "tiny alert button"
                ]
                ))
            ->getForm()
        ;
    }

    /**
     * Lists all Slider entities in grid.
     *
     * @Route("", name="backend_slide")
     * @Method("GET")
     * @Template()
     */
    public function gridAction()
    {
        $source = new Entity('ModuleSliderBundle:Slide');
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        $rowAction = new RowAction('', 'backend_slide_edit', false, '_self', ['class'=>'fi-pencil size-24 a-icon']);
        $grid->addRowAction($rowAction);

        $rowAction = new RowAction('', 'backend_slide_show', false,  '_blank', ['class'=>'fi-magnifying-glass size-24 a-icon']);
        $grid->addRowAction($rowAction);        

        return $grid->getGridResponse();
    }
}
