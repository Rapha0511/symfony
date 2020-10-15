<?php

namespace App\Repository;

use App\Entity\Syntheses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Syntheses|null find($id, $lockMode = null, $lockVersion = null)
 * @method Syntheses|null findOneBy(array $criteria, array $orderBy = null)
 * @method Syntheses[]    findAll()
 * @method Syntheses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SynthesesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Syntheses::class);
    }

    // /**
    //  * @return Syntheses[] Returns an array of Syntheses objects
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
    public function findOneBySomeField($value): ?Syntheses
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
