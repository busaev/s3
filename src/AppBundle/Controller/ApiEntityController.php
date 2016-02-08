<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\VarDumper\VarDumper;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @Route("/backend/api/entity")
 * 
 */
class ApiEntityController extends Controller
{
    /**
     * @Route("/{entityCode}", name="api_entity_index")
     * @Security("has_role('ROLE_MANAGER')")
     * 
     * @todo добавить проверок
     */
    public function indexAction(Request $request, $entityCode)
    {
        $utils = $this->get("utils");
        
        $em = $this->getDoctrine();
        
        $repoEntity = $em->getRepository($utils->getRepositoryLogicalName($entityCode));
        
        $query = $repoEntity->createQueryBuilder('e');
        $query->select('e')->where('1=1');
        
        $param = $request->query->get('param');
        
        if(null !== $param)
        {
            foreach($param as $key => $value)
            {
                $query->andWhere('e.' . $key . ' = :' . $key);
                $query->setParameter($key, $value);
            }
        }
        
        $result = $query->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        
        return new JsonResponse($result);
    }
}
