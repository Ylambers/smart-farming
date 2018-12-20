<?php

namespace AppBundle\Form;

use AppBundle\Enum\TopicTypeEnum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('topic_type', ChoiceType::class, [
                'choices' => TopicTypeEnum::getTopicTypes(),
                'choice_label' => function($choice){
                    return TopicTypeEnum::getTopicTypeName($choice);
                }
            ])
            ->add('text')
            ->add('mediaPath')
            ->add('solved')
            ->add('category', EntityType::class, [
                'class' => 'AppBundle\Entity\Category',
                'choice_label' => function ($category) {
                    return $category->getTitle();
                },

            ])
            ->add('subCategory')

        ;
    }



}
