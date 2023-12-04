<?php

namespace App\DataFixtures;

use App\Entity\Slider;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class SliderFixtures extends Fixture
{
    public const TITLE1 = "Éveillez vos sens avec notre Café d'Exception";
    public const TITLE2 = "Voyagez au cœur des arômes avec nos Cafés Gourmands";
    public const TITLE3 = "Découvrez l'Art du Café : Des saveurs uniques, une expérience inoubliable";

    public const SLIDER = [
        self::TITLE1 => [
            '',
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($nbSlider = 1; $nbSlider <= 3; $nbSlider++)
        {
            $slider = new Slider();
            $slider->setTitle($faker->sentence(3));
            $slider->setContent($faker->sentence(3));
            $slider->setButtonLink($faker->url);
            $slider->setButtonText($faker->sentence(3));

            $manager->persist($slider);
        }
        $manager->flush();
    }
}
