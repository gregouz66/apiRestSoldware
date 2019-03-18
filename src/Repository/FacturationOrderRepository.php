<?php

namespace App\Repository;

use App\Entity\FacturationOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FacturationOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method FacturationOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method FacturationOrder[]    findAll()
 * @method FacturationOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacturationOrderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FacturationOrder::class);
    }

//    /**
//     * @return FacturationOrder[] Returns an array of FacturationOrder objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FacturationOrder
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
