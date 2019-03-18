<?php

namespace App\Repository;

use App\Entity\FacturationUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FacturationUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method FacturationUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method FacturationUser[]    findAll()
 * @method FacturationUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacturationUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FacturationUser::class);
    }

//    /**
//     * @return FacturationUser[] Returns an array of FacturationUser objects
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
    public function findOneBySomeField($value): ?FacturationUser
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
