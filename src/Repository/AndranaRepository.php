<?php

namespace App\Repository;

use App\Entity\Andrana;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Andrana|null find($id, $lockMode = null, $lockVersion = null)
 * @method Andrana|null findOneBy(array $criteria, array $orderBy = null)
 * @method Andrana[]    findAll()
 * @method Andrana[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AndranaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Andrana::class);
    }

    public function findE()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.datee', 'DESC')
            ->orderBy('a.heuree', 'DESC')
            ->getQuery()
            ->getResult();
    }
    // /**
    //  * @return Andrana[] Returns an array of Andrana objects
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
    public function findOneBySomeField($value): ?Andrana
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
