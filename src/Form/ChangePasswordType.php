<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true,
                'label' => 'Votre adresse email'
            ])
            ->add('firstname', TextType::class, [
                'disabled' => true,
                'label' => 'Votre prénom'
            ])
            ->add('lastname', TextType::class, [
                'disabled' => true,
                'label' => 'Votre nom'
            ])
            ->add('old_password', PasswordType::class, [
                'mapped' =>false,
                'label' => 'Votre ancien mot de passe',
                'attr' => [
                    'placeholder' => 'Votre saisir votre mot de passe actuel'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'Votre nouveau mot de passe et sa confirmation doivent être identiques',
                'label' => 'Votre nouveau mot de passe',
                'required' => true,
                'first_options' => [
                    'label' => 'Votre nouveau mot de passe', 
                    'attr' => [
                        'placeholder' => 'Veillez saisir votre nouveau mot de passe'
                    ]
                    ],
                'second_options' => [
                    'label' => 'Confirmez votre nouveau mot de passe', 
                    'attr' => [
                        'placeholder' => 'Veillez confirmer votre nouveau mot de passe'
                    ]
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Mettre à jour'
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
