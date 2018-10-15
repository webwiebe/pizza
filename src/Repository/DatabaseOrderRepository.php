<?php

namespace App\Repository;

use App\Entity\PizzaOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PizzaOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method PizzaOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method PizzaOrder[]    findAll()
 * @method PizzaOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatabaseOrderRepository extends ServiceEntityRepository implements OrderStorageInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PizzaOrder::class);
    }

    public function save(PizzaOrder $order): void
    {
        $manager = $this->getEntityManager();
        $manager->persist($order);
        $manager->flush($order);
    }

    /**
     * @return PizzaOrder[]
     */
    public function getAllOrders(): array
    {
        return $this->findAll();
    }
}
