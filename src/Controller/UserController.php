<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Entity\User;
// use App\Form\ArticleType;

/**
 * User controller.
 * @Route("/api", name="api_")
 */
class UserController extends FOSRestController
{
      /**
       * Lists all Civility.
       * @Rest\Get("/users")
       *
       * @return Response
       */
      public function getUsersAction(ObjectManager $manager)
      {
        // $repository = $this->getDoctrine()->getRepository(User::class);
        // $data = $repository->findall();
        $conn = $manager->getConnection();
        $sql = '
                SELECT * FROM fos_user u
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        // $data = ['news1', 'news2'];

        return $this->handleView($this->view($data, 200));
      }
}
