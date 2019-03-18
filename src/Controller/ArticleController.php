<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Entity\Article;
use App\Form\ArticleType;

/**
 * Article controller.
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
      public function getArticleAction()
      {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repository->findall();
        return $this->handleView($this->view($articles));
      }


      /**
       * Create Article.
       * @Rest\Post("/article")
       *
       * @return Response
       */
      public function postArticleAction(Request $request)
      {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if ($form->isSubmitted() && $form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($article);
          $em->flush();
          return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
        }
        return $this->handleView($this->view($form->getErrors()));
      }

}
