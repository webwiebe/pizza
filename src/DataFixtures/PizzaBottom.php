<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PizzaBottom extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $classic = new \App\Entity\PizzaBottom();
        $classic->setName('Classic')
            ->setCost(5);
        $manager->persist($classic);

        $cheesy = new \App\Entity\PizzaBottom();
        $cheesy->setName('Cheesy crust')
            ->setCost(7);
        $manager->persist($cheesy);

        $manager->flush();
    }
}
