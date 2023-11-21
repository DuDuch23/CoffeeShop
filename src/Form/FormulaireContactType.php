<?php

namespace App\Form;

use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormulaireContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom : ',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'nom',
                    'placeholder' => 'Nom',
                ],
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom : ',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'prenom',
                    'placeholder' => 'Prénom',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail : ',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'email',
                    'placeholder' => 'E-mail',
                ],
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone : ',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'telephone',
                    'placeholder' => 'Téléphone',
                ],
            ])
            ->add('message', TextType::class, [
                'label' => 'Message : ',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'message',
                    'placeholder' => 'Message',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
