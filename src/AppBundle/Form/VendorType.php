<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VendorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label'=>'Title',
                'translation_domain' => 'global'
            ])
            ->add('short_description', null, [
                'label'=>'Short description',
                'translation_domain' => 'global',
                'required' => false
            ])
            ->add('description', null, [
                'label'=>'Description',
                'translation_domain' => 'global',
                'required' => false,
                'attr' => [
                    'class'=>'wysiwyg'
                ]
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
            ->add('routePath', null, [
                'label'=>'Route path',
                'translation_domain' => 'global',
                'attr' => []
            ])
            ->add('website', null, [
                'label'=>'Website',
                'translation_domain' => 'global'
            ])
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Content\Vendor'
        ));
    }

    public function getName()
    {
        return 'Shop_catalogbundle_vendortype';
    }
}
