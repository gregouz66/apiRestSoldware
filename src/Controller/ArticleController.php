<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
// use App\Entity\Article;
// use App\Form\ArticleType;

/**
 * Articles controller.
 * @Route("/api", name="api_")
 */
class ArticleController extends FOSRestController
{
      /**
       * Lists all Articles.
       * @Rest\Get("/articles")
       *
       * @return Response
       */
      public function getArticlesAction(ObjectManager $manager)
      {
        $conn = $manager->getConnection();
        $sql = '
                SELECT * FROM article a
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $this->handleView($this->view($data, 200));
      }

      /**
       * Lists Article by id.
       * @Rest\Get("/article/{id}"), requirements={"id" = "\d+"}, defaults={"id" = 1})
       *
       * @return Response
       */
      public function getArticleByIdAction($id, ObjectManager $manager)
      {
        $conn = $manager->getConnection();
        $sql = '
                SELECT * FROM article a
                WHERE a.id = :id
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $data = $stmt->Fetch();

        return $this->handleView($this->view($data, 200));
      }
}
