<?php
/**
 * Created by PhpStorm.
 * User: ylamb
 * Date: 27-12-2016
 * Time: 19:45
 */

namespace AppBundle\Form\Dashboard;

use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('email', TextType::class)
            ->add('phone', TextType::class)
            ->add('subject', TextType::class)
            ->add('message', TextareaType::class)
            ->add('captcha', CaptchaType::class)
            ->add('submit', SubmitType::class)
            ->getForm();
    }
}