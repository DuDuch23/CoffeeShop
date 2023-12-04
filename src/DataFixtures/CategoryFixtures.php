<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const MOULU = 'CATEGORY_MOULU';
    public const GRAIN = 'CATEGORY_GRAIN';

    public const CATEGORIES = [
        self::MOULU => [
            'name' => 'Café moulu',
        ],
        self::GRAIN => [
            'name' => 'Café en grain',
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this::CATEGORIES as $code => $attributes) {
            $category = new Category();
            $category->setName($attributes['name']);

            $manager->persist($category);

            $this->addReference($code, $category);
        }

        $manager->flush();
    }
}
