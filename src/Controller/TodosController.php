<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TodosController extends AbstractController
{
    /**
     * @Route("/todos", name="todos")
     */
    public function index()
    {

        return $this->render('todos.twig', [
        ]);
    }
}
