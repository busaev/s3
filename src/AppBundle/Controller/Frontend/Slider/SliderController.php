<?php

namespace AppBundle\Controller\Frontend\Slider;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SliderController extends Controller
{
    /**
     * @Route("/{slug}/show")
     * @Template()
     */
    public function showAction($slug)
    {
    	$em = $this->getDoctrine()->getManager();

        $slider = $em->getRepository('ModuleSliderBundle:Slider')->findOneByCode($slug);

        return array(
                'slider'=>$slider
            );    
    }

}
