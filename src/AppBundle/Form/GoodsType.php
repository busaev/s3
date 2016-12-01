<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;


use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class GoodsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label'=>'Title',
                'translation_domain' => 'global'
            ])
            ->add('article', null, [
                'label'=>'Article',
                'translation_domain' => 'global'
            ])
            ->add('brend', null, [
                'label'=>'Brend',
                'translation_domain' => 'global',
            ])
            ->add('price', MoneyType::class, [
                'label'=>'Price',
                'translation_domain' => 'global',
                'scale' => 2,
                'empty_data' => 0,
                'currency' => 'RUB'
                ])
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
                'attr' => []
            ])
            ->add('media', CollectionType::class, [
                'label'=>'Media',
                'translation_domain' => 'global',
                'entry_type' => MediaType::class,
                'allow_add'    => true,
                'by_reference' => false,
                'allow_delete' => true,
            ])
            ->add('categories', null, [
                'multiple' => true,
                'choice_label' => function($category, $key, $index) {
                    return $category->toStringWithParent();
                }
                
            ])
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Shop\Goods'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_shop_goods';
    }


}
