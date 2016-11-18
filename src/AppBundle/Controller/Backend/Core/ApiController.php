<?php

namespace AppBundle\Controller\Backend\Core;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Query;
use Symfony\Component\VarDumper\VarDumper;


/**
 * @Route("/backend/api")
 */
class ApiController extends Controller
{
    
    /**
     * @Route("/{entityCode}/{format}", 
     *        name="backend_api", 
     *        requirements={"format" = "json"}, 
     *        defaults={"entityCode" = "news", "format" = "json"}, 
     *        options={"expose"=true})
     */
    public function indexAction(Request $request, $entityCode, $format)
    {   
        $entities = $this->get("app.entities");        
        $currentEntity = $entities->$entityCode;
        
        // Основной запрос
        $query = $this->getDoctrine()
                ->getRepository($currentEntity->getLogicalName())
                ->createQueryBuilder('e')->select('e');
        
        // Если есть фильтр
        $param = $request->query->get('param');        
        if(null !== $param)
        {
            foreach($param as $key => $value)
            {
                $query->andWhere("e.{$key} = :{$key}");
                $query->setParameter($key, $value);
            }
        }
        return new JsonResponse($query->getQuery()->getResult(Query::HYDRATE_ARRAY));
    }
    
    /**
     * Для получения Маршрутов отдельный экшн.
     * Заполняем Название из Содержания
     * 
     * @Route("/routes/{entityCode}/{format}", 
     *        name="backend_api_routes", 
     *        requirements={"format" = "json"}, 
     *        defaults={"entityCode" = "news", "format" = "json"}, 
     *        options={"expose"=true})
     */
    public function routesAction(Request $request, $entityCode, $format)
    {  
        $entities = $this->get("app.entities");        
        $currentEntity = $entities->$entityCode;

        // Основной запрос
        $query = $this->getDoctrine()
                ->getRepository($currentEntity->getLogicalName())
                ->createQueryBuilder('e')->select('e');
        
        // Если есть фильтр
        $param = $request->query->get('param');
        if(null !== $param)
        {
            foreach($param as $key => $value)
            {
                $query->andWhere("e.{$key} = :{$key}");
                $query->setParameter($key, $value);
            }
        }
        
        // Все найденные пути
        $routes = $query->getQuery()->getResult(Query::HYDRATE_ARRAY);
        
        $contentIds = [];
        foreach($routes as $route)
        {
            if(isset($route['entryId']) && $route['entryId'] > 0)
            {
                $contentIds[] = $route['entryId'];
            }
        }
        
        // Заполняем Title
        if(!empty($contentIds))
        {
            //Добавим Название для ссылок
            $contentEntityCode = $param['entityCode'];
            $contentEntity =  $entities->$contentEntityCode;
            
            $query = $contentEntity->baseQuery();
            $query->andWhere('e.id in (:ids)');
            $query->setParameter('ids', $contentIds);

            $contents = $query->getQuery()->getResult(Query::HYDRATE_ARRAY);
            
            foreach ($contents as $content)
            {
                $title = false;
                if(isset($content['title']) && $content['title'] != '')
                {
                    $title = $content['title'];
                }
                
                foreach($routes as $ids => $route)
                {
                    if($route['entryId'] == $content['id'])
                    {
                        $routes[$ids]['title'] = $routes[$ids]['routePath'];
                        if($title)
                        {
                            $routes[$ids]['title'] = $title;
                        }
                    }
                }
            }
        }        
       
        return new JsonResponse($routes);
    }
}
