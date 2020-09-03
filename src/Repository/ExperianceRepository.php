<?php

namespace App\Repository;

use App\Entity\Experiance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Experiance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Experiance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Experiance[]    findAll()
 * @method Experiance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExperianceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Experiance::class);
    }

    // /**
    //  * @return Experiance[] Returns an array of Experiance objects
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
    public function findOneBySomeField($value): ?Experiance
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
