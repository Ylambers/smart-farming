<?php
/**
 * Created by PhpStorm.
 * User: UltimateFlex
 * Date: 17-12-2018
 * Time: 12:23
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("description", TextareaType::class,[
                'label' => "Omschrijving"
            ])
            ->add("media_path", FileType::class, [
                'label' => "Selecteer uw media",
                'required' => false,
            ])
            ->add("submit", SubmitType::class,[
                'label' => "Beantwoord"
            ])
            ->getForm();
    }
}