<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
      $securityContext = $this->container->get('security.authorization_checker');
      //ha a user már be van lépve írányítsuk át a todoshoz
      if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
        return $this->redirectToRoute('todos');
      }
      return $this->render('login.twig', []);
    }
}
