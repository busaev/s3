<?php

namespace AppBundle\Controller\Backend;

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
}
