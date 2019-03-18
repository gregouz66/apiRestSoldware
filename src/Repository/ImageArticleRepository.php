<?php

namespace App\Repository;

use App\Entity\ImageArticle;
use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageArticle[]    findAll()
 * @method ImageArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageArticle::class);
    }

    /**
     * @param $article
     * @return LigneArticle Return LigneArticle objects
     */
    public function getImageDefault(Article $article)
    {
        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.article = :article')
            ->andWhere('p.par_defaut = 1')
            ->setParameter('article', $article)
            ->setMaxResults(1)
            ->getQuery();

        return $qb->getOneOrNullResult();

    }
}
