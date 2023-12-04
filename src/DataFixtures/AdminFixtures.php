<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($nbAdmin = 1; $nbAdmin <= 3; $nbAdmin++)
        {
            $admin = new Admin();
            $admin->setEmail($faker->email);
            if($nbAdmin == 1)
            {
                $admin->setRoles(['ROLE_SUPER_ADMIN']);
            }
            else
            {
                $admin->setRoles(['ROLE_ADMIN']);
            }
            $password = 'azerty';
            $admin->setPassword($this->encoder->hashPassword($admin, $password));
            
            $manager->persist($admin);
        }
        $manager->flush();
    }
}
