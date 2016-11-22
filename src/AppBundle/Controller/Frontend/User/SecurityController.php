<?php

namespace AppBundle\Controller\Frontend\User;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/security")
 */
class SecurityController extends Controller {

    /**
     * @Route("/login", name="frontend_security_login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('frontend/security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
        
    /**
     * @Route("/login_check", name="frontend_security_login_check")
     */
    public function loginCheckAction(Request $request) {
        
    }

    /**
     * @Route("/logout", name="frontend_security_logout")
     */
    public function logoutAction(Request $request) {

    }

}
