<?php

namespace App\Repository;

use App\Entity\PizzaBottom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PizzaBottom|null find($id, $lockMode = null, $lockVersion = null)
 * @method PizzaBottom|null findOneBy(array $criteria, array $orderBy = null)
 * @method PizzaBottom[]    findAll()
 * @method PizzaBottom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PizzaBottomRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PizzaBottom::class);
    }

//    /**
//     * @return PizzaBottom[] Returns an array of PizzaBottom objects
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
    public function findOneBySomeField($value): ?PizzaBottom
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
