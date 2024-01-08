<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $dataAdmin = [
            [
                'email' => 'alexduduch77@gmail.com',
                'role' => ["ROLE_SUPER_ADMIN"],
                'password' => 'Duduch',
            ],
            [
                'email' => 'alexduduch60@gmail.com',
                'role' => ["ROLE_ADMIN"],
                'password' => 'Duduch',
            ],
            [
                'email' => 'testSupprimer@gmail.com',
                'role' => ["ROLE_SUPER_ADMIN"],
                'password' => 'Supprimer',
            ],
            [
                'email' => 'testModifier@gmail.com',
                'role' => ["ROLE_ADMIN"],
                'password' => 'Modifier',
            ],
            [
                'email' => 'testSupprimer1@gmail.com',
                'role' => ["ROLE_SUPER_ADMIN"],
                'password' => 'Supprimer',
            ],
            [
                'email' => 'testModifier1@gmail.com',
                'role' => ["ROLE_ADMIN"],
                'password' => 'Modifier',
            ],
            [
                'email' => 'testSupprimer2@gmail.com',
                'role' => ["ROLE_SUPER_ADMIN"],
                'password' => 'Supprimer',
            ],
            [
                'email' => 'testModifier2@gmail.com',
                'role' => ["ROLE_ADMIN"],
                'password' => 'Modifier',
            ],

        ];

        foreach($dataAdmin as $data)
        {
            $admin = new Admin();
            $admin->setEmail($data['email']);
            $admin->setRoles($data['role']);
            $admin->setPassword($this->passwordHasher->hashPassword($admin, $data['password']));
            
            $manager->persist($admin);
        }
        $manager->flush();
    }
}
