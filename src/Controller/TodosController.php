<?php

namespace App\Controller;

use App\Form\TodoType;
use App\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class TodosController extends Controller
{
    /**
     * @Route("/todos", name="todos")
     */
    public function index(Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // 1) build the form
        $todo = new Todo();
        $form = $this->createForm(TodoType::class, $todo);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $todo->getTaskName() !== '') {
          $todo->setDeadline(new \DateTime('now'));
          $todo->setIsDone(false);

          $em = $this->getDoctrine()->getManager();
          $em->persist($todo);
          $em->flush();
        }


        $user = $this->getUser();
        $todos = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->findBy(['userId' => $user->getId()]);


        return $this->render('todos.twig', [
          'todos' => $todos,
        ]);
    }
}
