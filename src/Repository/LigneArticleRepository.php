<?php

namespace App\Repository;

use App\Entity\LigneArticle;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneArticle[]    findAll()
 * @method LigneArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneArticle::class);
    }

    /**
     * @param $user
     * @return LigneArticle[] Returns an array of LigneArticle objects
     */
    public function findCart(User $user): array
    {
        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.user = :user')
            ->andWhere('p.ordered = 0')
            ->setParameter('user', $user)
            ->getQuery();

        return $qb->execute();

    }

    /**
     * @param $article
     * @return LigneArticle[] Returns an array of LigneArticle objects
     */
    public function findIfIsInTheCart(Article $article)
    {
        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.article = :article')
            ->andWhere('p.ordered = 0')
            ->setParameter('article', $article)
            ->getQuery()
            ->execute();

        if($qb->isEmpty()){
          return null;
        } else {
          return $qb;
        }
    }

}
