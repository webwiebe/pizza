<?php

namespace App\Repository;

use App\Entity\PizzaTopping;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PizzaTopping|null find($id, $lockMode = null, $lockVersion = null)
 * @method PizzaTopping|null findOneBy(array $criteria, array $orderBy = null)
 * @method PizzaTopping[]    findAll()
 * @method PizzaTopping[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PizzaToppingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PizzaTopping::class);
    }

//    /**
//     * @return PizzaTopping[] Returns an array of PizzaTopping objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PizzaTopping
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
