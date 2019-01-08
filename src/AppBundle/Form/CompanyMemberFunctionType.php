<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyMemberFunctionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('company')
            ->add('function', EntityType::class,[
            'class' => 'AppBundle:CompanyMember',
            'label'=> "Bedrijf",
                'choice_label' => function ($category) {
                    return $category->getId() ;
                }])



            ->add('company', EntityType::class, [
                'class' => 'AppBundle:CompanyFunction',
                'label' => "Functie",
                'choice_label' => function ($category) {
                    return $category->getTitle() ;
                }]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CompanyMemberFunction'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_companymemberfunction';
    }


}
