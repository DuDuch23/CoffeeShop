<?php

namespace App\Form;

use App\Entity\Admin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'attr' => [
                'class' => 'email',
            ],
            'required' => false,
            'row_attr' => [
                'class' => 'form-group col-md-6',
            ]
        ])
        ->add('role', TextType::class, [
            'label' => 'Rôle',
            'attr' => [
                'class' => 'role',
            ],
            'required' => false,
            'row_attr' => [
                'class' => 'form-group col-md-6',
            ]
        ])
        ->add('password', PasswordType::class, [
            'label' => 'Mot de passe',
            'attr' => [
                'class' => 'password',
            ],
            'required' => false,
            'row_attr' => [
                'class' => 'form-group col-md-6',
            ],
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Envoyer'
        ]);
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}