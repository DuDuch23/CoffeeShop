<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductsFixtures extends Fixture implements DependentFixtureInterface
{
    public const PRODUCTS = [
        [
            'name' => 'Lavazza',
            'description'=> 'test',
            'price' => 2,
            'note' => 9,
            'family' => 'test',
            'country' => 'test',
            'best_seller' => true,
        ],
        [
            'name' => 'Lavazza',
            'description'=> 'test',
            'price' => 2,
            'note' => 9,
            'family' => 'test',
            'country' => 'test',
            'best_seller' => false,
        ]
    ];

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; ++$i)
        {
            $product = new Product();
            $product->setName('name' . $i);
            $product->setDescription('description'. $i);
            $product->setPrice(6);
            $product->setNote(9.5. $i);
            $product->setFamily('Café aromatisé'. $i);
            $product->setCountry('France'. $i);
            $product->isBestSeller();
            $product->setCategory($this->getReference('categorie-' . rand(1,2)));
            $product->setBrand($this->getReference('marque'. rand(1,2)));

            $manager->persist($product);
        }
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class
        ];
    }
}