<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModulePagesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('module')
            ->add('metaTitle', null, [
                'label'=>'Meta Title',
                'translation_domain' => 'backend'
            ])
            ->add('metaDescription', null, [
                'label'=>'Meta Description',
                'translation_domain' => 'backend'
            ])
            ->add('metaKeywords', null, [
                'label'=>'Meta Keywords',
                'translation_domain' => 'backend'
            ])
            ->add('title', null, [
                'label'=>'Title',
                'translation_domain' => 'backend'
            ])
            ->add('action', null, [
                'label'=>'Action',
                'translation_domain' => 'backend'
            ])
            ->add('routePath', null, [
                'label'=>'Route path',
                'translation_domain' => 'backend',
                'attr' => []
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ModulePages'
        ));
    }
}
