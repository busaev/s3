<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/navigation")
 */
class NavigationController extends Controller
{
    /**
     * @Route("", name="frontend_navigation_show")
     */
    public function showAction(Request $request, $params=null)
    {
        $em  = $this->getDoctrine()->getManager();
        $tpl = $this->get('app.tpl');
        
        $repositoryNavigation = $em->getRepository('AppBundle:Navigation');
        
        $navigation = $repositoryNavigation->findOneBy(['code'=>$params['code']]);
        
        return $this->render($tpl->getTpl('navigation', $params['code'].'.html.twig') , array(
            'entity' => $navigation
        ));
    }
}
