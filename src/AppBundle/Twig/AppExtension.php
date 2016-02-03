<?php
namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('actions', array($this, 'actions')),
        );
    }

    public function actions($entityCode, $entity=false)
    {
        return $entityCode;
    }

    public function getName()
    {
        return 'app_extension';
    }
}