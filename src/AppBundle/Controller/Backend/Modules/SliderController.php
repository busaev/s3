<?php

namespace AppBundle\Controller\Backend\Modules;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Modules\Slider;
use AppBundle\Form\SliderType;

/**
 * Slider controller.
 *
 * @Route("/backend/slider")
 */
class SliderController extends Controller
{

    /**
     * Lists all Slider entities.
     *
     * @Route("", name="backend_slider_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render('backend/modules/slider/index.html.twig', array(
            'entityCode' => 'slider',
            'entities' => $em->getRepository('AppBundle:Modules\\Slider')->findAll(),
        ));
    }
    
    
    /**
     * Creates a new News entity.
     *
     * @Route("/new", name="backend_slider_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {   
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        
        $entity = new Slider;
        
        $form = $this->createForm(SliderType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {   
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->addFlash('alert-success', $translator->trans('A new entry is added!', [], 'messages'));

            return $this->redirectToRoute('backend_slider_show', ['id' => $entity->getId()]);
        }
        
        //крошки
        $breadcrumbs->addItem($translator->trans('Slider', [], 'global'), $this->get("router")->generate("backend_slider_index"));
        $breadcrumbs->addItem($translator->trans('Creating', [], 'global'));
        
        return $this->render('backend/modules/slider/new.html.twig', array(
            'entityCode' => 'slider',
            'entity'     => $entity,
            'form'       => $form->createView(),
        ));
    }
    
    /**
     * Creates a new Slider entity.
     *
     * @Route("", name="backend_slider_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Slider();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            foreach ($entity->getSlides() as $slide) 
            {
                VarDumper::dump($slide);
                die();
                $slide->setSlider($entity);
            }

            $em->persist($entity);
            $em->flush();
            
            $this -> get('session') -> getFlashBag() -> add('notice', 'Запись добавлена!');

            return $this->redirect($this->generateUrl('backend_slider_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Slider entity.
    *
    * @param Slider $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Slider $entity)
    {
        $form = $this->createForm(SliderType::class, $entity, array(
            'action' => $this->generateUrl('backend_slider_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Создать', 'attr' => array('class' => 'tiny success button radius')));

        return $form;
    }

    /**
     * Finds and displays a Slider entity.
     *
     * @Route("/{id}/show", name="backend_slider_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Modules\\Slider')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Запись не найдена (Slider).');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Slider entity.
     *
     * @Route("/{id}/edit", name="backend_slider_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Modules\\Slider')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Запись не найдена (Slider).');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Slider entity.
    *
    * @param Slider $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Slider $entity)
    {
        $form = $this->createForm(new SliderType(), $entity, array(
            'action' => $this->generateUrl('backend_slider_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Изменить', 'attr' => array('class' => 'tiny button radius')));

        return $form;
    }
    /**
     * Edits an existing Slider entity.
     *
     * @Route("/{id}", name="backend_slider_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Modules\\Slider')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Запись не найдена (Slider).');
        }

        $originalSlides = new ArrayCollection();
        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($entity->getSlides() as $slide) {
            $originalSlides->add($slide);
        }

        $entity->setEditor($this -> getUser());
        $entity->setEditedAt(new \DateTime());

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            // remove the relationship between the tag and the Task
            foreach ($originalSlides as $slide) {
                if (false === $entity->getSlides()->contains($slide)) {
                    $slide->setSlider(null);

                    $em->persist($slide);

                    // if you wanted to delete the Tag entirely, you can also do that
                     $em->remove($slide);
                }
            }

            foreach ($entity->getSlides() as $slide) {
                $slide->setCreator($this -> getUser());
                $slide->setCreatedAt(new \DateTime());
                $slide->setEditor($this -> getUser());
                $slide->setEditedAt(new \DateTime());
                $slide->setSlider($entity);
            }

            $em->persist($entity);

            $em->flush();
            
            $this -> get('session') -> getFlashBag() -> add('notice', 'Запись обновлена!');

            return $this->redirect($this->generateUrl('backend_slider_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Slider entity.
     *
     * @Route("/{id}", name="backend_slider_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Modules\\Slider')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Запись не найдена (Slider).');
            }
            
            $this -> get('session') -> getFlashBag() -> add('notice', 'Запись удалена!');

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backend_slider'));
    }

    /**
     * Creates a form to delete a Slider entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('backend_slider_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Удалить', 'attr' => array(
                'class' => 'tiny alert button radius',
                'onclick' => 'if(!confirm(\'Вы действительно хотите удалить запись?\')){return false}'
            )))
            ->getForm()
        ;
    }
   
}
