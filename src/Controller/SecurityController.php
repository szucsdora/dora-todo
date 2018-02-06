<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
      public function login(Request $request, AuthenticationUtils $authUtils)
      {
          // get the login error if there is one
          $error = $authUtils->getLastAuthenticationError();

          // last username entered by the user
          $lastUsername = $authUtils->getLastUsername();
          //ha a user már be van lépve írányítsuk át a todoshoz
          $securityContext = $this->container->get('security.authorization_checker');
          if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('todos');
          }

          return $this->render('login.twig', array(
              'last_username' => $lastUsername,
              'error'         => $error,
          ));
      }
}
