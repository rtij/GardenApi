<?php

namespace App\Repository;

use App\Entity\Entrer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Entrer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entrer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entrer[]    findAll()
 * @method Entrer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntrerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entrer::class);
    }

    public function findE()
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.datee', 'DESC')
            ->orderBy('s.heuree', 'DESC')
            ->getQuery()
            ->getResult();
    }
    // /**
    //  * @return Entrer[] Returns an array of Entrer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Entrer
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
