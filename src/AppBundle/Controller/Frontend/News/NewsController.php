<?php

namespace AppBundle\Controller\Frontend\News;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\News;

/**
 * News controller.
 *
 * @Route("/news")
 */
class NewsController extends Controller
{
    /**
     * Lists all News entities.
     *
     * @Route("/", name="news_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('AppBundle:Content\News')->findAll();

        return $this->render('frontend/news/index.html.twig', array(
            'entities' => $news,
        ));
    }

    /**
     * Finds and displays a News entity.
     *
     * @Route("/{id}", name="news_show")
     * @Method("GET")
     */
    public function showAction($news)
    {
        
        $tpl      = $this->get('app.tpl');

        return $this->render($tpl->getTpl('news', 'show.html.twig') , array(
            'entity' => $news,
        ));
    }
    
    /**
     * @Method("GET")
     */
    public function routeAction(Request $request)
    {
        $entities = $this->get('app.entities');
        
        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository($entities->news->getLogicalName())->findOneBy([
            'routePath' => $request->getPathInfo()
        ]);
        
        return $this->showAction($news);
    }
}
