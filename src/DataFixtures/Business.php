<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Business extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $dominos = new \App\Entity\Business();
        $dominos->setName('Dominos')
            ->setDelivery(true)
            ->setTakeOut(false);
        $manager->persist($dominos);

        $newYork = new \App\Entity\Business();
        $newYork->setName('New York Pizza')
            ->setDelivery(false)
            ->setTakeOut(true);
        $manager->persist($newYork);

        $manager->flush();
    }
}
