<?php

namespace App\Repository;

use App\Entity\SchtroumpfJob;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SchtroumpfJob|null find($id, $lockMode = null, $lockVersion = null)
 * @method SchtroumpfJob|null findOneBy(array $criteria, array $orderBy = null)
 * @method SchtroumpfJob[]    findAll()
 * @method SchtroumpfJob[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchtroumpfJobRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SchtroumpfJob::class);
    }

    // /**
    //  * @return SchtroumpfJob[] Returns an array of SchtroumpfJob objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SchtroumpfJob
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
