<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VendorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label'=>'Title',
                'translation_domain' => 'backend'
            ])
            ->add('short_description', null, [
                'label'=>'Short description',
                'translation_domain' => 'backend',
                'required' => false
            ])
            ->add('description', null, [
                'label'=>'Description',
                'translation_domain' => 'backend',
                'required' => false,
                'attr' => [
                    'class'=>'wysiwyg'
                ]
            ])
            ->add('path', null, [
                'label'=>'Path',
                'translation_domain' => 'backend'
            ])
            ->add('website', null, [
                'label'=>'Website',
                'translation_domain' => 'backend'
            ])
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Vendor'
        ));
    }

    public function getName()
    {
        return 'Shop_catalogbundle_vendortype';
    }
}
