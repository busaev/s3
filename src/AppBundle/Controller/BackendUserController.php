<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use AppBundle\Entity\User;
use AppBundle\Form\UserEditType;
use AppBundle\Form\UserNewType;
use AppBundle\Form\UserPasswordType;


/**
 * User controller.
 *
 * @Route("/backend/user")
 */
class BackendUserController extends Controller
{
    /**
     * Creates a new User entity.
     *
     * @Route("/new", name="backend_user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $utils       = $this->get('utils');
        
        $entityCode = 'user';
        
        $user = new User();
        $form = $this->createForm('AppBundle\Form\UserNewType', $user);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            if('' != trim($user->getPassword()))
            {
                $encoder = $this->container->get('security.password_encoder');
                $encoded = $encoder->encodePassword($user, $user->getPassword());

                $user->setPassword($encoded);
            }
            
            $this->addFlash('alert-success', $translator->trans('A new user is added!', [], 'messages'));
            
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('backend_entity_list', array('entityCode' => $entityCode));
        }
        
        //крошки
        $breadcrumbs->addItem(
                $translator->trans($utils->getEntityTitle($entityCode), [], 'global'),
                $this->get("router")->generate("backend_entity_list", ['entityCode' => $entityCode]));
        $breadcrumbs->addItem($translator->trans('Creating', [], 'backend'));

        return $this->render('backend/entity/new.html.twig', array(
            'entityCode' => 'user',
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/{id}/edit", name="backend_user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User $user)
    {
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $utils       = $this->get('utils');
        
        $entityCode = 'user';
        
        $em = $this->getDoctrine()->getManager();
        
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('AppBundle\Form\UserEditType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            if('' != trim($user->getPassword()))
            {
                $encoder = $this->container->get('security.password_encoder');
                $encoded = $encoder->encodePassword($user, $user->getPassword());

                $user->setPassword($encoded);
            }
            
            $this->addFlash('alert-success', $translator->trans('Record updated!', [], 'messages'));

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('backend_user_edit', array('id' => $user->getId()));
        }
        
        //крошки
        $breadcrumbs->addItem(
                $translator->trans($utils->getEntityTitle($entityCode), [], 'global'),
                $this->get("router")->generate("backend_entity_list", [ 'entityCode' => $entityCode ]));
        $breadcrumbs->addItem($user,  $this->get("router")->generate("backend_entity_show", [ 'id' => $user->getId() ]));
        $breadcrumbs->addItem($translator->trans('Editing', [], 'backend'));

        return $this->render('backend/entity/edit.html.twig', array(
            'entityCode'=>'user',
            'entity' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/{id}/password", name="backend_user_password_edit")
     * @Method({"GET", "POST"})
     */
    public function passwordAction(Request $request, User $user)
    {
        $translator  = $this->get('translator');
        
        $em = $this->getDoctrine()->getManager();
        $userBeforUpdate = $em->getRepository('AppBundle:User')->find($user->getId());
        
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('AppBundle\Form\UserPasswordType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            if('' != trim($user->getPassword()))
            {
                $encoder = $this->container->get('security.password_encoder');
                $encoded = $encoder->encodePassword($user, $user->getPassword());

                $user->setPassword($encoded);
            }
            
            $this->addFlash('alert-success', $translator->trans('Password updated!', [], 'messages'));

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('backend_user_edit', array('id' => $user->getId()));
        }

        return $this->render('backend/entity/edit.html.twig', array(
            'entityCode'=>'user',
            'entity' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/{id}", name="backend_user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
