<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('username')
            ->add('password', TextType::class, ['required'=>false])
            ->add('email')
            ->add('fullName')
            ->add('paidCourses')
            ->add('notes')
            ->add('creditBalance')
            ->add('roles',ChoiceType::class,[
                'choices' =>[
                        'ROLE_ADMIN'=>'ROLE_ADMIN',
                        'ROLE_SUPER_ADMIN'=>'ROLE_ADMIN',
                        'ROLE_USER'=>'ROLE_USER'
                    ],
                    'expanded'=>true,
                    'multiple'=>true,
                ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
