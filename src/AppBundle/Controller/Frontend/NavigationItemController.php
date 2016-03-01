<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/navigationitem")
 */
class NavigationItemController extends Controller
{
    /**
     * @Route("", name="index_index")
     */
    public function indexAction(Request $request, $params=null)
    {
        $em = $this->getDoctrine()->getManager();
        
        $entities = $this->get('app.entities');
        $tpl      = $this->get('app.tpl');
        
        $entityCode = 'navigation_item';
        
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
}
