<?php

namespace App\Form;

use App\Entity\Slider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SliderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => [
                    'class' => 'title form-control',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-4',
                ]
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu',
                'attr' => [
                    'class' => 'content form-control',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-4',
                ]
            ])
            ->add('buttonLink', UrlType::class, [
                'label' => 'Lien bouton',
                'attr' => [
                    'class' => 'buttonLink form-control',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-4',
                ]
            ])
            ->add('buttonText', TextareaType::class, [
                'label' => 'Texte bouton',
                'attr' => [
                    'class' => 'buttonText form-control',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-4',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn',
                ],
                'row_attr' => [
                    'class' => 'text-center'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // on indique au formulaire qu'il représente la classe Slider
            'data_class' => Slider::class,
        ]);
    }
}