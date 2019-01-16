<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Config\Definition\IntegerNode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;

class CompanyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label' => "Titel"
            ])
            ->add('description', TextType::class, [
                'label' => "Omschrijving van uw bedrijf"
            ])
            ->add('websiteUrl', TextType::class,[
                'label' => "Voer uw email in",
                'attr' => [
                    'placeholder' => "Voorbeeld@gmail.com"
                ]
            ])
            ->add('kvk', TextType::class, [
                'label' => "Voer het kvk nummer in",
                'attr' => [
                    'placeholder' => "Bijvoorbeeld 12464323"
                ]
            ]);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Company'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_company';
    }


}
