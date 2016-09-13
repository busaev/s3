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
                'translation_domain' => 'global',
                'required' => true
            ])
            ->add('parentNavigationItem', null, [
                'label'=>'Parent item',
                'translation_domain' => 'global'
            ])
            ->add('module', null, [
                'label'=>'Module',
                'translation_domain' => 'global',
                'translation_domain' => 'global',
                'required' => true
            ])
            ->add('modulePage', null, [
                'label'=>'Module page',
                'translation_domain' => 'global',
                'translation_domain' => 'global'
            ])
            ->add('route', null, [
                'label'=>'Route path',
                'translation_domain' => 'global',
                'required' => true
            ])
            ->add('title', null, [
                'label'=>'Title',
                'translation_domain' => 'global'
            ])
            ->add('target', null, [
                'label'=>'Target',
                'translation_domain' => 'global'
            ])
            ->add('position', null, [
                'label'=>'Position',
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
                'translation_domain' => 'global',
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
            'data_class' => 'AppBundle\Entity\Core\NavigationItem',
        ));
    }
}
