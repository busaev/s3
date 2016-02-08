<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;

use AppBundle\Entity\Module;
use AppBundle\Entity\ModulePages;

class NavigationItemType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('navigation', null, [
                'label'=>'Navigation',
                'translation_domain' => 'backend'
            ])
            ->add('parentNavigationItem', null, [
                'label'=>'Parent navigation item',
                'translation_domain' => 'backend'
            ])
            //->add('childrenNavigationItems')
            ->add('module')
            ->add('title', null, [
                'label'=>'Title',
                'translation_domain' => 'backend'
            ])
            ->add('target', null, [
                'label'=>'Target',
                'translation_domain' => 'backend'
            ])
            ->add('position', null, [
                'label'=>'Position',
                'translation_domain' => 'backend'
            ])
            ->add('entryStatus', EntityType::class, [
               'class' => 'AppBundle:ScrollItem',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('i')
                        ->join('i.scroll', 's')
                        ->where('s.code=\'entry_status\'')
                        ->andWhere('i.code !=\'delete\'')
                        ->orderBy('i.position', 'ASC');
                },
            ])
        ;
                
                
                
                
        $formModifier = function (FormInterface $form, Module $module = null) {
            $pages = null === $module ? array() : $module->getModulePages();

            $form->add('modulePage', EntityType::class, array(
                'class'       => 'AppBundle:ModulePages',
                'placeholder' => '',
                'choices'     => $pages,
                'label'=>'Module page',
                'translation_domain' => 'backend'
            ));
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                $data = $event->getData();
                $formModifier($event->getForm(), $data->getModule());
            }
        );

        $builder->get('module')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $module = $event->getForm()->getData();
                $formModifier($event->getForm()->getParent(), $module);
            }
        );
        
        
        

        
        
        
        
        
        
        
        $formModifier2 = function (FormInterface $form, ModulePages $modulePage = null) {
            $route = null === $modulePage ? array() : $modulePage->getRoute();

            $form->add('route', EntityType::class, array(
                'class'       => 'AppBundle:Route',
                'placeholder' => '',
                'choices'     => $route,
                'label'=>'Route path',
                'translation_domain' => 'backend'
            ));
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier2) {
                $data = $event->getData();
                
                $formModifier2($event->getForm(), $data->getModulePage());
            }
        );
        

        if($builder->has('modulePage'))
        {
            $builder->get('modulePage')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) use ($formModifier2) {
                    $modulePage = $event->getForm()->getData();
                    $formModifier2($event->getForm()->getParent(), $modulePage);
                }
            );
        }
        
        
        
        
        
        
        
        
        
        
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\NavigationItem',
        ));
    }
}
