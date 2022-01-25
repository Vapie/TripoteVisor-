<?php

namespace App\Repository;

use App\Entity\Schtroumpf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Schtroumpf|null find($id, $lockMode = null, $lockVersion = null)
 * @method Schtroumpf|null findOneBy(array $criteria, array $orderBy = null)
 * @method Schtroumpf[]    findAll()
 * @method Schtroumpf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchtroumpfRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Schtroumpf::class);
    }

    // /**
    //  * @return Schtroumpf[] Returns an array of Schtroumpf objects
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
    public function findOneBySomeField($value): ?Schtroumpf
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
