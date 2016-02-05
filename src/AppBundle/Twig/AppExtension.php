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
        
        $globalTemplatesPath = $globals['kernel_root_dir'] . '/Resources/views/';
        
        $templates = [
            'backend/entity/actions/'.$entityCode.'/'.$action.'.html.twig',
            'backend/entity/actions/default/'.$action.'.html.twig'
        ];
        
        foreach($templates as $template)
        {
            if(!file_exists($globalTemplatesPath . $template))
                continue;
            
            $tplPath = $template;
            break;
        }
        
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