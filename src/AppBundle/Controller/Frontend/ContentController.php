<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Query;

/**
 * @Route("/frontend/content")
 */
class ContentController extends Controller
{
    /**
     * @Route("/{entityCode}", 
     *        name="frontend_content_entry", 
     *        defaults={"params" = "false"}, 
     *        options={"expose"=true})
     * 
     * @Method("GET")
     */
    public function indexAction(Request $request, $params=null)
    {   
        $em = $this->getDoctrine()->getManager();
        
        $entities = $this->get('app.entities');
        $tpl      = $this->get('app.tpl');
        
        $route = $em->getRepository('AppBundle:Core\\Route')->findOneBy([
            'routePath' => $request->getPathInfo()
        ]);
        
        if( NULL === $route )
        {
            throw new NotFoundHttpException('Page not found');
        }
        
        
        $entityCode = $route->getEntityCode();
        $entity = $entities->$entityCode;
        
        $query = $entity->baseQuery();
        
        // Если есть фильтр 
        if(null !== $params)
        {
            foreach($params as $key => $value)
            {
                $query->andWhere("e.{$key} = :{$key}");
                $query->setParameter($key, $value);
            }
        }
        
        
        return $this->render($tpl->getTpl($entityCode) , array(
            'entityCode' => $entityCode,
            'entities'   => $this->get('annotations')->fillProperties($entityCode, $query->getQuery()->getResult()),
        ));
    }
    
    /**
     * Находит по пути из адресной строки маршрут
     * Из маршрута получает сущность и запись
     * и рендерит
     *
     * @Method("GET")
     */
    public function routeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $tpl      = $this->get('app.tpl');
        $entities = $this->get('app.entities');

        $route = $em->getRepository('AppBundle:Core\\Route')->findOneBy([
            'routePath' => $request->getPathInfo()
        ]);

        // маршрут не найден
        if( NULL === $route )
        {
            throw new NotFoundHttpException('Page not found');
        }

        $entityCode = $route->getEntityCode();

        // находим запись
        $entity = $em->getRepository($entities->$entityCode->getLogicalName())->findOneBy([
            'routePath' => $request->getPathInfo()
        ]);

        // рендер
        return $this->render($tpl->getTpl($entityCode, 'show.html.twig'), array(
            'entity' => $entity,
        ));
    }

    
    /**
     * Finds and displays a News entity.
     *
     * @Route("/{entityCode}/{id}/show", name="frontend_content_entry_show", defaults={"entityCode" = "news"})
     * @Method("GET")
     */
    public function showAction(Request $request, $entityCode, $id)
    {
        Symfony\Component\VarDumper\VarDumper::dump(1);
        die();

        $translator  = $this->get('translator');
        $entities    = $this->get("app.entities");
        $tpl         = $this->get('app.tpl');



        $currentEntity = $entities->$entityCode;

        $entity = $this->getDoctrine()
                       ->getRepository($currentEntity->getLogicalName())
                       ->find($id);
        
        // рендер
        return $this->render($tpl->getTpl($entityCode, 'show.html.twig'), array(
            'entity' => $entity,
        ));
    }
}
