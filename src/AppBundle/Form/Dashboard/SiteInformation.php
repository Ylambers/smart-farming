<?php
/**
 * Created by PhpStorm.
 * User: ylamb
 * Date: 13-12-2016
 * Time: 22:34
 */

namespace AppBundle\Form\Dashboard;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SiteInformation extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('owner', TextType::class, [
                'required' => false
            ])
            ->add('siteName', TextType::class, [
                'required' => false
            ])
            ->add('email', TextType::class, [
                'required' => false
            ])
            ->add('phoneNumber', IntegerType::class, [
                'required' => false
            ])
            ->add('address', TextType::class, [
                'required' => false
            ])
            ->add('zipcode', TextType::class, [
                'required' => false
            ])
            ->add('city', TextType::class, [
                'required' => false
            ])
            ->add('country', CountryType::class,[
                'required' => false
            ])
            ->add('Submit', SubmitType::class)
            ->getForm();
    }
}