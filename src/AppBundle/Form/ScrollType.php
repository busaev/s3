<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScrollType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', null, [
                'label'=>'Code',
                'translation_domain' => 'global'
            ])
            ->add('title', null, [
                'label'=>'Title',
                'translation_domain' => 'global'
            ])
            ->add('position', null, [
                'label'=>'Position',
                'translation_domain' => 'global'
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Core\Scroll'
        ));
    }
}
