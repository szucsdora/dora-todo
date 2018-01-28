<?php

namespace App\Controller;

use App\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TodosController extends AbstractController
{
    /**
     * @Route("/todos", name="todos")
     */
    public function index()
    {
        $todos = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->findBy(['userId' => 1]);
        return $this->render('todos.twig', [
          'todos' => $todos,
        ]);
    }
}
