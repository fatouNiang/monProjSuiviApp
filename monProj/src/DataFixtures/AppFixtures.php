<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
/**
 * 
 * @var UserPasswordEncoderInterface 
 */

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker= Factory::create("fr_FR");
        $profils= ["administrateur","formateur","communityManager","apprenant"];
    
        for ($i=0; $i <5; $i++) {
            $user= new User();
            $user->setUsername($faker->name())
                //->setRoles("admin")
                ->setPassword($this->encoder->EncodePassword( $user, 'password'))
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName);
            $manager->persist($user);
        }
        for ($p=0; $p < 4; $p++) { 
            $profil= new Profil();
            $profil->setLibelle($faker->unique()->randomElement($profils))
                    ->setArchivage('0');
            $manager->persist($profil);
        }
        
        $manager->flush();
    }
}
