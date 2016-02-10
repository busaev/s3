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

use AppBundle\Entity\Modules\Module;
use AppBundle\Entity\ModulePage;

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
            ->add('modulePage')
            ->add('route', null, [
                'label'=>'Title',
                'translation_domain' => 'backend'
            ])
            ->add('module', null, [
                'label'=>'Title',
                'translation_domain' => 'backend'
            ])
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
