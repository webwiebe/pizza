<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UpdatePreference extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $email = new \App\Entity\UpdatePreference();
        $email->setName('Email');
        $manager->persist($email);

        $sms = new \App\Entity\UpdatePreference();
        $sms->setName('sms');
        $manager->persist($sms);

        $manager->flush();
    }
}
