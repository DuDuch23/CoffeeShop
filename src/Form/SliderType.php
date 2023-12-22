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
                    'class' => 'title',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'group col-md-6',
                ]
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu',
                'attr' => [
                    'class' => 'content',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group col-md-6',
                ]
            ])
            ->add('button_link', UrlType::class, [
                'label' => 'Lien bouton',
                'attr' => [
                    'class' => 'button_link',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group col-md-6',
                ]
            ])
            ->add('button_text', TextareaType::class, [
                'label' => 'Texte bouton',
                'attr' => [
                    'class' => 'button_text',
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
            // on indique au formulaire qu'il représente la classe Slider
            'data_class' => Slider::class,
        ]);
    }
}