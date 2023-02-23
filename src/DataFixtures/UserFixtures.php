<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder) 
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for ( $i = 0; $i <= 20; $i++) {

            $IsVerified = rand(0,1);

            $user = new User();

            if ($i == 0) {
                $user->setEmail( 'brandon@hotmail.com' );
                $user->setPassword( $this->encoder->hashPassword( $user, '123456789' ) );
                $user->setIsVerified( '1' );
                $user->setRoles( array('ROLE_ADMIN') );
                $user->setFirstName( 'Brandon' );
                $user->setMiddleName( 'CCI' );
                $user->setLastName( 'CHANITE' );
                $user->setMobile( '0620145500' );
                $user->setVendor( '1' );
                $user->setRegistredAt(new \DateTimeImmutable);
                $user->setLastLogin(new \DateTimeImmutable);
                $user->setIntro('1');
                $user->setProfile('je suis le patron du site internet...');
            }


            $user->setEmail( $faker->email() );
            $user->setPassword( $this->encoder->hashPassword( $user, '123456789' ) );
            $user->setIsVerified( $IsVerified );
            $user->setRoles( array('ROLE_USER') ); 
            $user->setFirstName( $faker->firstName() );
            $user->setMiddleName( $faker->firstName() );
            $user->setLastName( $faker->lastName() );
            $user->setMobile( $faker->e164PhoneNumber() );
            $user->setVendor( $IsVerified );
            $user->setRegistredAt(new \DateTimeImmutable);
            $user->setLastLogin(new \DateTimeImmutable);
            $user->setIntro('1');
            $user->setProfile('88');


            // je vais enregister de maniere aléatoire des utilisateurs.
            $this->addReference('user_' . $i, $user);
            
            $manager->persist($user);
        }

        $manager->flush();
    }
}


