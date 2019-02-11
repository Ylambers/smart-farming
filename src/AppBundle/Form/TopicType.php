<?php

namespace AppBundle\Form;

use AppBundle\Enum\TopicTypeEnum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
class TopicType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('title', TextType::class, [
            'label' => "Titel"
        ]);
       $builder ->add('topic_type', ChoiceType::class, [
            'label' => "Onderwerp Type",
            'choices' => TopicTypeEnum::getTopicTypes(),
            'choice_label' => function($choice){
                return TopicTypeEnum::getTopicTypeName($choice);
            }
        ]);
        $builder->add('text', TextareaType::class, [
            'label' => "Vraag text",
            'attr' => [
                'placeholder' => "Voer uw vraag in"
            ]
        ]);
        $builder->add("media_path", FileType::class,[
            'label' => "Selecteer uw media",
            'required' => false
        ]);
        $builder->add('solved', CheckboxType::class,[
            'label' => "Opgelost",
            'required' => false
        ]);
        if($this->authorization->isGranted('ROLE_SUPER_ADMIN'))
        {
            $builder->add('activated', CheckboxType::class,[
                'label' => "Geactiveerd"
            ]);
        }
            $builder->add('category', EntityType::class, [
                'label' => "Categorie",
                'class' => 'AppBundle\Entity\Category',
                'choice_label' => function ($category) {
                    return $category->getTitle();
                },
        ]);
        $builder->add('subCategory', TextType::class,[
            'label' => "Sub categorie",
            'attr' => [
                'placeholder' => "Voer uw sub categorie in"
            ]
        ]);
    }
    private $authorization;

    public function __construct(AuthorizationChecker $authorizationChecker)
    {
        $this->authorization = $authorizationChecker;
    }

}
