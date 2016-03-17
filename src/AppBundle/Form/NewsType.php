<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class NewsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
                'translation_domain' => 'global',
                'attr' => [
                    'class'=>'property-title'
                ]
            ])
            ->add('shortContent', null, [
                'label'=>'Short content',
                'translation_domain' => 'global',
                'attr' => [
                    'class'=>'wysiwyg'
                ]
            ])
            ->add('content', null, [
                'label'=>'Content',
                'translation_domain' => 'global',
                'attr' => [
                    'class'=>'wysiwyg'
                ]
            ])
            ->add('entryStatus', EntityType::class, [
               'class' => 'AppBundle:Core\\ScrollItem',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('i')
                        ->join('i.scroll', 's')
                        ->where('s.code=\'entry_status\'')
                        ->andWhere('i.code !=\'delete\'')
                        ->orderBy('i.position', 'ASC');
                },
            ])
            ->add('routePath', null, [
                'label'=>'Route path',
                'translation_domain' => 'global',
                'attr' => [
                    'class'=>'property-routePath'
                ]
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Content\News'
        ));
    }
}
