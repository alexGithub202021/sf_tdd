<?php

namespace App\Repository;

use App\Entity\Testentity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Testentity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Testentity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Testentity[]    findAll()
 * @method Testentity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Testentity::class);
    }

    // /**
    //  * @return Testentity[] Returns an array of Testentity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Testentity
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
