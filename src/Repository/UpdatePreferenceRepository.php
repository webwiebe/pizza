<?php

namespace App\Repository;

use App\Entity\UpdatePreference;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UpdatePreference|null find($id, $lockMode = null, $lockVersion = null)
 * @method UpdatePreference|null findOneBy(array $criteria, array $orderBy = null)
 * @method UpdatePreference[]    findAll()
 * @method UpdatePreference[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UpdatePreferenceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UpdatePreference::class);
    }

//    /**
//     * @return UpdatePreference[] Returns an array of UpdatePreference objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UpdatePreference
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
