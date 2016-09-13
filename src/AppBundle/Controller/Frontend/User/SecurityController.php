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
     * @Route("/login", name="security_login")
     */
    public function loginAction(Request $request)
    {
        $user = $this->getUser();
        if ($user instanceof UserInterface) {
            return $this->redirectToRoute('frontend_index_index');
        }

        /** @var AuthenticationException $exception */
        $exception = $this->get('security.authentication_utils')
                          ->getLastAuthenticationError();

        return $this->render('frontend/security/login.html.twig', [
                    'error' => $exception ? $exception->getMessage() : NULL,
        ]);
    }
        
    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction(Request $request) {
        
    }

}
