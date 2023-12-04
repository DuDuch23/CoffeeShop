<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public const NESPRESSO = 'BRAND_NESPRESSO';
    public const LAVAZZA = 'BRAND_LAVAZZA';

    public const BRAND = [
        self::NESPRESSO => [
            'name' => 'Nespresso',
        ],
        self::LAVAZZA => [
            'name' => 'Lavazza',
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this::BRAND as $code => $attributes) {
            $brand = new Brand();
            $brand->setName($attributes['name']);

            $manager->persist($brand);

            $this->addReference($code, $brand);
        }

        $manager->flush();
    }
}
