<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Entity\Civility;
use Symfony\Component\HttpFoundation\JsonResponse;
// use App\Form\ArticleType;

/**
 * Civility controller.
 * @Route("/api", name="api_")
 */
class CivilityController extends FOSRestController
{
    /**
     * Lists all Civility.
     * @Rest\Get("/civilitys")
     *
     * @return Response
     */
    public function getCivilityAction()
    {
      $repository = $this->getDoctrine()->getRepository(Civility::class);
      $data = $repository->findall();

      // $data = ['news1', 'news2'];

      return $this->handleView($this->view($data, 200));
    }
}
