<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class ModulePageType extends AbstractType
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
                'translation_domain' => 'global'
            ])
            ->add('metaDescription', null, [
                'label'=>'Meta Description',
                'translation_domain' => 'global'
            ])
            ->add('metaKeywords', null, [
                'label'=>'Meta Keywords',
                'translation_domain' => 'global'
            ])
            ->add('title', null, [
                'label'=>'Title',
                'translation_domain' => 'global'
            ])
            ->add('routePath', null, [
                'label'=>'Route path',
                'translation_domain' => 'global',
                'attr' => []
            ])  
            ->add('action', null, [
                'label'=>'Action',
                'translation_domain' => 'global',
                'attr' => []
            ])
            ->add('review', null, [
                'label'=>'Review',
                'translation_domain' => 'global',
                'attr' => []
            ])
            ->add('entryStatus', EntityType::class, [
               'class' => 'AppBundle:Core\\ScrollItem',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('i')
                        ->join('i.scroll', 's')
                        ->where('s.code=\'entry_status\'')
                        ->orderBy('i.position', 'ASC');
                },
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Core\ModulePage'
        ));
    }
}
