<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function index()
    {

        return $this->render('register.twig', [
        ]);
    }
    /**
     * @Route("/registration/new", name="registration_new")
     */
    public function register()
    {

        return $this->render('register.twig', [
        ]);
    }
}
