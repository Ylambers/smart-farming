<?php
/**
 * Created by PhpStorm.
 * User: yaronlambers
 * Date: 24/11/2016
 * Time: 11:37
 */

namespace AppBundle\Form\Dashboard;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UserProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $year = date("Y");
        $month = date("m");
        $day = date("d");

        $builder
            ->add('firstName', TextType::class, [
                'required' => true
            ])
            ->add('lastName', TextType::class, [
                'required' => true
            ])
            ->add('dateOfBirth', DateType::class, array(
                'widget' => 'choice',
                'years' => range($year,1901),
                'months' => range(1, 12),
                'days' => range(1, 31)
            ))
            ->add('phoneNumber', TextType::class, [
                'required' => false
            ])
            ->add('mobileNumber', TextType::class, [
                'required' => false
            ])
            ->add('address', TextType::class, [
                'required' => false
            ])
            ->add('zipcode', TextType::class, [
                'required' => false
            ])
            ->add('city', TextType::class,[
                'required' => false
            ])
            ->add('country', CountryType::class,[
                'required' => false
            ])
            ->add('Submit', SubmitType::class)
            ->getForm();
    }
}