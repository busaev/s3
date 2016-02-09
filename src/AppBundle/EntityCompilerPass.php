<?php
namespace AppBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class EntityCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('app.entities')) {
            return;
        }

        $definition = $container->findDefinition(
            'app.entities'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'app.entity'
        );
        
        foreach ($taggedServices as $id => $tags) {
            $parts = 
            $definition->addMethodCall(
                'addEntity',
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
