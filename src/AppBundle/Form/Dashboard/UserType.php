<?php
/**
 * Created by PhpStorm.
 * User: ylamb
 * Date: 10-11-2016
 * Time: 18:06
 */

namespace AppBundle\Form\Dashboard;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $year = date("Y");

//        if ($this->authorization->isGranted('ROLE_SUPER_ADMIN')) {
            $builder->add('enabled', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Actief' => '1', 'Niet actief' => '0'
                ],
                'label' => "Account status"
            ]);

            $builder->add('roles', ChoiceType::class, [
                'choices' => [
                    'User' => 'ROLE_USER', 'Employee' => 'ROLE_EMPLOYEE', 'Admin' => 'ROLE_SUPER_ADMIN'
                ],
                'label' => "Rechten",
                'expanded' => false,
                'multiple' => true,
            ]);
//        }

        $builder->add('email', TextType::class, []);
        $builder->add('first_name', TextType::class, [
            'required' => true,
            'label' => "Voornaam"
        ]);
        $builder->add('last_name', TextType::class, [
            'required' => true,
            'label' => "Achternaam"
        ]);
        $builder->add('dateOfBirth', DateType::class, array(
            'required' => true,
            'widget' => 'single_text',
            'label' => "Geboortejaar",
            'format' => 'yyyy-MM-dd',
            'attr' => ['class' => 'js-datepicker'],
            'years' => range($year, 1901),
            'months' => range(1, 12),
            'days' => range(1, 31)
        ));

        $builder->add('ranking', EntityType::class, [
            'class' => 'AppBundle:Ranking',
            'label' => "Rank",
            'choice_label' => function ($category) {
                return $category->getTitle() . " | " . $category->getDescription();
        }]);

        $builder->add('Submit', SubmitType::class)->getForm();
    }

//    private $authorization;
//
//    public function __construct(AuthorizationChecker $authorizationChecker)
//    {
//        $this->authorization = $authorizationChecker;
//    }
}