<?php
namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('actions', array($this, 'actions'), array(
                'is_safe' => array('html'),
                'needs_environment' => true
            )),
        );
    }

    public function actions(\Twig_Environment $twig, $entityCode, $action='list', $entity=false)
    {
        $globals = $twig->getGlobals();
        
        $tplPath = false;
        
        $defaultTemplatePath = $globals['kernel_root_dir'] . '/Resources/views/backend/entity/actions/default/'.$action.'.html.twig';
        $entityTemplatePath  = $globals['kernel_root_dir'] . '/Resources/views/backend/entity/actions/'.$entityCode.'/'.$action.'.html.twig';
        
        if(file_exists($defaultTemplatePath))
            $tplPath = $defaultTemplatePath;
        
        if(file_exists($entityTemplatePath))
            $tplPath = $entityTemplatePath;
        
        if( ! $tplPath)
            return '';
        
        return $twig->render($tplPath, [
            'entityCode' => $entityCode,
            'entity'     => $entity,
        ]);
    }

    public function getName()
    {
        return 'app_extension';
    }
}