<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Query;

use AppBundle\Entity\ContentBaseEntity;

/**
 * @Route("/frontend/content")
 */
class ContentController extends Controller
{
    /**
     * @Route("/{entityCode}", 
     *        name="frontend_content_entry", 
     *        defaults={"entityCode" = "news", "params" = "false"}, 
     *        options={"expose"=true})
     */
    public function indexAction(Request $request, $entityCode, $params=null)
    {   
        $entities = $this->get('app.entities');
        $tpl      = $this->get('app.tpl');
        
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
     * Finds and displays a News entity.
     *
     * @Route("/{entityCode}/{id}/show", name="frontend_content_entry_show", defaults={"entityCode" = "news"})
     * @Method("GET")
     */
    public function showAction(Request $request, $entityCode, $id)
    {
        $translator  = $this->get('translator');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $entities    = $this->get("app.entities");
        
        $currentEntity = $entities->$entityCode;

        $entity = $this->getDoctrine()
                       ->getRepository($currentEntity->getLogicalName())
                       ->find($id);

        // крошки
        $breadcrumbs->addItem(
                $translator->trans($currentEntity->getTitle(), [], 'global'),
                $this->get("router")->generate("backend_content_entry", ['entityCode' => $entityCode]));
        $breadcrumbs->addItem($entity);
        $breadcrumbs->addItem($translator->trans('Viewing', [], 'global'));
        
        // рендер
        return $this->render('backend/entity/show.html.twig', array(
            'entityCode' => $entityCode,
            'entity' => $entity,
            'annotations' => $this->get('annotations')->fillOneProperties($entityCode, $entity),
            'delete_form' => $this->createDeleteForm($entity, $entityCode)->createView(),
        ));
    }
}
