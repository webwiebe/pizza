<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PizzaTopping extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $hawaii = new \App\Entity\PizzaTopping();
        $hawaii->setName('Hawaii')
            ->setCost(12);
        $manager->persist($hawaii);

        $spicy = new \App\Entity\PizzaTopping();
        $spicy->setName('Hot & Spicy')
            ->setCost(12);
        $manager->persist($spicy);

        $manager->flush();
    }
}
