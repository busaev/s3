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
        $doctrine = $this->getDoctrine();
        $em  = $doctrine->getManager();
        
        $entities = $this->get('app.entities');
        $tpl      = $this->get('app.tpl');
        
        $entityScroll = $entities->scroll_item;

        // Статус
        $status = $doctrine->getRepository($entityScroll->getLogicalName())
                           ->findByScrollItemCodeAndScrollCode('delete', 'entry_status');
        
        $entity = $entities->navigation;
        
        $repositoryNavigation = $em->getRepository($entity->getLogicalName());
        
        $navigation = $repositoryNavigation->findOneBy(['code'=>$params['code']]);

        return $this->render($tpl->getTpl('navigation', $params['code'].'.html.twig') , array(
            'entity' => $navigation
        ));
    }
}
