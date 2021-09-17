<?php

namespace App\Repository;

use App\Entity\Sortiequery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sortiequery|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sortiequery|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sortiequery[]    findAll()
 * @method Sortiequery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortiequeryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sortiequery::class);
    }
    
    public function findS()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.dates', 'DESC')
            ->orderBy('a.heures', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Sortiequery[] Returns an array of Sortiequery objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sortiequery
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
