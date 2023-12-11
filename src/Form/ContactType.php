<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('last_name', TextType::class, [
                'label' => 'Nom : ',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'nom',
                    'placeholder' => 'Nom',
                ],
            ])
            ->add('first_name', TextType::class, [
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
            ->add('phone', TextType::class, [
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
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // on indique au formulaire qu'il représente la classe Contact
            'data_class' => Contact::class,
        ]);
    }
}
