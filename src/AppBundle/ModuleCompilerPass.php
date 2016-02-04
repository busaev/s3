<?php
namespace AppBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class ModuleCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('app.modules')) {
            return;
        }

        $definition = $container->findDefinition(
            'app.modules'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'app.module'
        );
        
        foreach ($taggedServices as $id => $tags) {
            $parts = 
            $definition->addMethodCall(
                'addModule',
                array($this->extractKey($id), new Reference($id))
            );
        }
    }
    
    private function extractKey($id)
    {
        if(strpos($id, '.')) {
            $parts = explode('.', $id);
            return $parts[0];
        }
        return $id;
    }
}
