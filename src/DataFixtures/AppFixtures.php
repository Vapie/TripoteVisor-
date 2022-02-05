<?php

namespace App\DataFixtures;

use App\Entity\Review;
use App\Entity\Schtroumpf;
use App\Entity\SchtroumpfJob;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordHasherInterface
     */
    private $encoder;
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {

        $schtroumpf1 = new Schtroumpf();
        $manager->persist($schtroumpf1->setName("le grand schtroumpf"));
        $manager->flush();
        $schtroumpf2 = new Schtroumpf();
        $manager->persist($schtroumpf2->setName("le schtroumpf grognon"));
        $manager->flush();
        $schtroumpf3 = new Schtroumpf();
        $manager->persist($schtroumpf3->setName("le schtroumpf en Y"));
        $manager->flush();
        $schtroumpf4 = new Schtroumpf();
        $manager->persist($schtroumpf4->setName("la schtroumfette ( fraiche ) "));
        $manager->flush();

        $user1 = new User();
        $manager->persist($user1->setEmail("user1@user1.fr")->setPassword($this->encoder->hashPassword($user1,"password"))->setRoles(["ROLE_API"]));
        $manager->flush();
        $user2 = new User();
        $manager->persist($user2->setEmail("user2@user2.fr")->setPassword($this->encoder->hashPassword($user2,"password"))->setRoles(["ROLE_ADMIN"]));
        $manager->flush();
        $user3 = new User();
        $manager->persist($user3->setEmail("user3@user3.fr")->setPassword($this->encoder->hashPassword($user3,"password"))->setRoles([""]));
        $manager->flush();
        $user4 = new User();
        $manager->persist($user4->setEmail("user4@user4.fr")->setPassword($this->encoder->hashPassword($user4,"password"))->setRoles(["ROLE_ADMIN"]));
        $manager->flush();

        $job1 = new SchtroumpfJob();
        $manager->persist($job1->setRole("ADMIN")->setUser($user1)->setSchtroumpf($schtroumpf1));
        $manager->flush();

        $job2 = new SchtroumpfJob();
        $manager->persist($job2->setRole("ADMIN")->setUser($user1)->setSchtroumpf($schtroumpf2));
        $manager->flush();

        $job3 = new SchtroumpfJob();
        $manager->persist($job3->setRole("ADMIN")->setUser($user2)->setSchtroumpf($schtroumpf2));
        $manager->flush();

        $job4 = new SchtroumpfJob();
        $manager->persist($job4->setRole("CREATOR")->setUser($user2)->setSchtroumpf($schtroumpf3));
        $manager->flush();

        $job5 = new SchtroumpfJob();
        $manager->persist($job5->setRole("ADMIN")->setUser($user4)->setSchtroumpf($schtroumpf4));
        $manager->flush();


        $review1 = new Review();
        $manager->persist($review1->setSchtroumpf($schtroumpf1)->setContent("Jai vraiment schtroumfé ce sschtroumpf ce message à été écrit à 00h00")->setCreationDate(new \DateTime("now"))->setRating(4)->setStatus(1)->setTitle("La review 4")->setUserEmail("mail@mail.mail")->setUsername("schAnnon"));
        $manager->flush();
        $review2 = new Review();
        $manager->persist($review2->setSchtroumpf($schtroumpf2)->setContent("Jai vraiment schtroumfé ce sschtroumpf pourquoi y'a une typo")->setCreationDate(new \DateTime("now"))->setRating(4)->setStatus(1)->setTitle("La review 18041")->setUserEmail("mail@mail.mail")->setUsername("schAnnon"));
        $manager->flush();
        $review3 = new Review();
        $manager->persist($review3->setSchtroumpf($schtroumpf3)->setContent("Jai vraiment schtroumfé ce sschtroumpf mais en vrai non")->setCreationDate(new \DateTime("now"))->setRating(4)->setStatus(1)->setTitle("La review 6")->setUserEmail("mail@mail.mail")->setUsername("schAnnon"));
        $manager->flush();
        $review4 = new Review();
        $manager->persist($review4->setSchtroumpf($schtroumpf4)->setContent("Jai vraiment schtroumfé ce sschtroumpf jure ?")->setCreationDate(new \DateTime("now"))->setRating(4)->setStatus(1)->setTitle("La review 45")->setUserEmail("mail@mail.mail")->setUsername("schAnnon"));
        $manager->flush();

        $review11 = new Review();
        $manager->persist($review11->setSchtroumpf($schtroumpf1)->setContent("Jai vraiment schtroumfé cette aventure au sein du parc asterix ( je me suis bien schtroumfé)")->setCreationDate(new \DateTime("now"))->setRating(4)->setStatus(2)->setTitle("La review 1")->setUserEmail("mail@mail.mail")->setUsername("schAnnon"));
        $manager->flush();
        $review22 = new Review();
        $manager->persist($review22->setSchtroumpf($schtroumpf2)->setContent("Ce schtroumf était délicieux")->setCreationDate(new \DateTime("now"))->setRating(4)->setStatus(2)->setTitle("La review 8")->setUserEmail("aez@maial.mail")->setUsername("schAnezfenon"));
        $manager->flush();
        $review33 = new Review();
        $manager->persist($review33->setSchtroumpf($schtroumpf3)->setContent("ceci est un schtroumpf de haine")->setCreationDate(new \DateTime("now"))->setRating(4)->setStatus(3)->setTitle("La review 4")->setUserEmail("mail@madil.mail")->setUsername("schAnnfdon"));
        $manager->flush();
        $review44= new Review();
        $manager->persist($review44->setSchtroumpf($schtroumpf4)->setContent("salut mr le schtroumf ")->setCreationDate(new \DateTime("now"))->setRating(4)->setStatus(1)->setTitle("La review 2")->setUserEmail("mail@maidl.mail")->setUsername("schAnnon"));
        $manager->flush();





    }
}
