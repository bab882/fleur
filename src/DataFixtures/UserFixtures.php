<?php

namespace App\DataFixtures;

use Faker;
Use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();
        
        for ($i = 0; $i >= 20; $i++)
        {
            $user = new User();
            $user->setEmail($faker->email());
            $user->setPassword();
        }
        

        $manager->flush();
    }
}
