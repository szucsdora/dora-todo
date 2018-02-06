<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        //ha a user már be van lépve írányítsuk át a todoshoz
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
          return $this->redirectToRoute('todos');
        }
        // 1) feépítjük a felhasználó űrlapot
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) az ürlap submitjának/postjának kezelése
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) felhasználó jelshzavának a titkosítása
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            // 4) felhasználó mentése
            $em = $this->getDoctrine()->getManager();
            $em->persist($user); //új felhasználó mentésének előkészítése
            $em->flush(); //a várakozó adatbázis művelet végrehajtása

            return $this->redirectToRoute('login');
        }

        return $this->render(
            'register.twig',
            array('form' => $form->createView())
        );
    }
}
