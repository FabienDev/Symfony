<?php

namespace Adoptez\AnimalsBundle\Form;

use Sluggable\Fixture\Issue939\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class AdvertType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('birthday', DateType::class)
            ->add('published', CheckboxType::class, array('required' => false))
            ->add('categories', EntityType::class, array(
                'class'    => 'AdoptezAnimalsBundle:Category',
                'choice_label' => 'name',
                'multiple' => true
            ))
            ->add('pictures', CollectionType::class, array(
                'entry_type' => PicturesType::class,
                'allow_add' => true,
                'allow_delete' => true
            ))
            ->add('save', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Adoptez\AnimalsBundle\Entity\Advert'
        ));
    }
}
