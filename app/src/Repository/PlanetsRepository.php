<?php

namespace App\Repository;

use App\Entity\Planets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Planets|null find($id, $lockMode = null, $lockVersion = null)
 * @method Planets|null findOneBy(array $criteria, array $orderBy = null)
 * @method Planets[]    findAll()
 * @method Planets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Planets::class);
        $this->manager = $manager;
    }

    // /**
    //  * @return Planets[] Returns an array of Planets objects
    //  */
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

    public function removePlanet(Planets $planet)
    {
        $this->manager->remove($planet);
        $this->manager->flush();
    }

    public function addPlanet(Planets $planet)
    {
        $this->manager->persist($planet);
        $this->manager->flush();
    }

    public function updatePlanet(Planets $planet, array $data)
    {
        $planet
            ->setName($data['Name'])
            ->setMaincolor($data['Color'])
            ->setDiametre($data['Diametre']);

        $this->manager->flush();
    }

    /*
    public function findOneBySomeField($value): ?Planets
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
