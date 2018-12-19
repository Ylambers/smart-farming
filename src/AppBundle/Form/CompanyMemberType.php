<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyMemberType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('company')
            ->add('company', EntityType::class, [
                'class' => 'AppBundle:CompanyMember',
                'label' => "Functie",
                'choice_label' => function ($category) {
                    return $category->getCompany()->getTitle() ;
                }])
//            ->add('user')
            ->add('user', EntityType::class, [
                'class' => 'AppBundle:CompanyMember',
                'label' => "Functie",
                'choice_label' => function ($category) {
                    return $category->getUser()->getUsername() ;
                }]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CompanyMember'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_companymember';
    }


}
