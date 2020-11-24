<?php

namespace App\Repository;

use App\Entity\StatutMarital;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StatutMarital|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatutMarital|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatutMarital[]    findAll()
 * @method StatutMarital[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatutMaritalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatutMarital::class);
    }

    // /**
    //  * @return StatutMarital[] Returns an array of StatutMarital objects
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
    public function findOneBySomeField($value): ?StatutMarital
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
