<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CategoryType extends AbstractType
{
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
            ->add('parentCategory', null, [
                'label'=>'Parent category',
                'translation_domain' => 'global',
                'required' => false
            ])
            ->add('short_content', null, [
                'label'=>'Short description',
                'translation_domain' => 'global',
                'required' => false
            ])
            ->add('content', null, [
                'label'=>'Description',
                'translation_domain' => 'global',
                'required' => false,
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
            ->add('media', MediaType::class, [
                'label'=>'Media',
                'translation_domain' => 'global'
            ])
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Content\Brend'
        ));
    }

    public function getName()
    {
        return 'Shop_catalogbundle_brendtype';
    }
}
