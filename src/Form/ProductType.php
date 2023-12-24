<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Nom',
            'attr' => [
                'class' => 'name',
            ],
            'required' => false,
            'row_attr' => [
                'class' => 'group col-md-6',
            ]
        ])
        ->add('description', TextareaType::class, [
            'label' => 'Description',
            'attr' => [
                'class' => 'description',
            ],
            'required' => false,
            'row_attr' => [
                'class' => 'group col-md-6',
            ]
        ])
        ->add('price', MoneyType::class, [
            'label' => 'Prix',
            'attr' => [
                'class' => 'price',
            ],
            'required' => false,
            'row_attr' => [
                'class' => 'form-group col-md-6',
            ]
        ])
        ->add('note', IntegerType::class, [
            'label' => 'Note',
            'attr' => [
                'class' => 'note',
            ],
            'required' => false,
            'row_attr' => [
                'class' => 'form-group col-md-6',
            ]
        ])
        ->add('family', ChoiceType::class, [
            'label' => 'Famille',
            'attr' => [
                'class' => 'family',
            ],
            'required' => false,
            'row_attr' => [
                'class' => 'form-group col-md-6',
            ],
        ])
        ->add('country', CountryType::class, [
            'label' => 'Pays',
            'attr' => [
                'class' => 'country',
            ],
            'required' => false,
            'row_attr' => [
                'class' => 'form-group col-md-6',
            ]
        ])
        ->add('best_seller', CheckboxType::class, [
            'label' => 'Populaire ?',
            'attr' => [
                'class' => 'best_seller',
            ],
            'required' => false,
            'row_attr' => [
                'class' => 'form-group col-md-6',
            ],
        ])
        ->add('category', EntityType::class, [
            'label' => 'Catégorie',
            'choice_label' => 'name',
            'class' => 'App\Entity\Category',
            'attr' => [
                'class' => 'category',
            ],
            'required' => false,
            'row_attr' => [
                'class' => 'form-group col-md-6',
            ]
        ])
        ->add('brand', EntityType::class, [
            'label' => 'Marque',
            'choice_label' => 'name',
            'class' => 'App\Entity\Brand',
            'attr' => [
                'class' => 'brand',
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
            // on indique au formulaire qu'il représente la classe Product
            'data_class' => Product::class,
        ]);
    }
}