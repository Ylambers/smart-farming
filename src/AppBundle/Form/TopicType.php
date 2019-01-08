<?php

namespace AppBundle\Form;

use AppBundle\Enum\TopicTypeEnum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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

        $builder->add('title');
           $builder ->add('topic_type', ChoiceType::class, [
                'choices' => TopicTypeEnum::getTopicTypes(),
                'choice_label' => function($choice){
                    return TopicTypeEnum::getTopicTypeName($choice);
                }
            ]);
        $builder->add('text');
        $builder->add('mediaPath');
        $builder->add('solved');
        if($this->authorization->isGranted('ROLE_SUPER_ADMIN'))
        {
            $builder->add('activated');
        }
            $builder->add('category', EntityType::class, [
                'class' => 'AppBundle\Entity\Category',
                'choice_label' => function ($category) {
                    return $category->getTitle();
                },
        ]);
        $builder->add('subCategory');
    }
    private $authorization;

    public function __construct(AuthorizationChecker $authorizationChecker)
    {
        $this->authorization = $authorizationChecker;
    }

}
