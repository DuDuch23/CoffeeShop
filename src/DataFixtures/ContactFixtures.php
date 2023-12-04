<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($nbContact = 1; $nbContact < 10; $nbContact++)
        {
            $contact = new Contact();
            $contact->setLastName($faker->lastName);
            $contact->setFirstName($faker->firstName);
            $contact->setEmail($faker->email);
            $contact->setPhone($faker->e164PhoneNumber);
            $contact->setMessage($faker->text);

            $manager->persist($contact);
        }
        $manager->flush();
    }
}