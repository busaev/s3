<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use AppBundle\Form\MediaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Form\AttributeValueType;


class AttributeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label'=>'Title',
                'translation_domain' => 'global'
            ])
            ->add('description', null, [
                'label'=>'Description',
                'translation_domain' => 'global'
            ])
            ->add('media', MediaType::class, [
                'label'=>'Media',
                'translation_domain' => 'global'
            ])  
            ->add('inPreview', null, [
                'label'=>'Show in preview',
                'translation_domain' => 'global'
            ])
            ->add('inFilters', null, [
                'label'=>'Show in filters',
                'translation_domain' => 'global'
            ])
            ->add('productType', EntityType::class, [
                'class' => 'AppBundle:Core\\ScrollItem',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('i')
                        ->join('i.scroll', 's')
                        ->where('s.code=\'shop_product_types\'')
                        ->andWhere('i.code !=\'delete\'')
                        ->orderBy('i.position', 'ASC');
                },
                'label'=>'Product type',
                'translation_domain' => 'global'
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
                'label'=>'Entry status',
                'translation_domain' => 'global'
            ])
            ->add('dataType', EntityType::class, [
                'class' => 'AppBundle:Core\\ScrollItem',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('i')
                        ->join('i.scroll', 's')
                        ->where('s.code=\'data_types\'')
                        ->andWhere('i.code !=\'delete\'')
                        ->orderBy('i.position', 'ASC');
                },
                'label'=>'Data type',
                'translation_domain' => 'global'
            ])
            ->add('viewType', EntityType::class, [
                'class' => 'AppBundle:Core\\ScrollItem',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('i')
                        ->join('i.scroll', 's')
                        ->where('s.code=\'view_types\'')
                        ->andWhere('i.code !=\'delete\'')
                        ->orderBy('i.position', 'ASC');
                },
                'label'=>'View type',
                'translation_domain' => 'global'
            ])
            ->add('values', CollectionType::class, array(
                'entry_type' => AttributeValueType::class,
                'allow_add'    => true,
                'by_reference' => false,
                'allow_delete' => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Shop\Attribute'
        ));
    }
}
