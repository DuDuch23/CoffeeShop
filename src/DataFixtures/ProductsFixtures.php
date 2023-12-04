<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ProductsFixtures extends Fixture implements DependentFixtureInterface
{
    // public const PRODUCT = [
    //     [
    //         'name' => 'Lavazza',
    //     ]
    // ]
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($nbProduct = 1; $nbProduct <= 30; $nbProduct++)
        {
            $product = new Product();
            if(rand(0,1) === 1)
            {
                $product->setCategory($this->getReference(CategoryFixtures::MOULU));
            }
            else
            {
                $product->setCategory($this->getReference(CategoryFixtures::GRAIN));
            }

            if(rand(0,1) === 1)
            {
                $product->setBrand($this->getReference(BrandFixtures::NESPRESSO));
            }
            else
            {
                $product->setBrand($this->getReference(BrandFixtures::LAVAZZA));
            }

            $product->setName($faker->name);
            $product->setDescription($faker->text);
            $product->setPrice($faker->randomFloat(2,2,10));
            $product->setNote($faker->randomFloat(2,0,10));
            $product->setFamily($faker->randomElement(['Robusta','Arabica','Pacamara']));
            $product->setCountry($faker->randomElement(['France','Angleterre','Mexique']));
            $product->setBestSeller($faker->boolean);

            $manager->persist($product);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            BrandFixtures::class,
        ];
    }
}
