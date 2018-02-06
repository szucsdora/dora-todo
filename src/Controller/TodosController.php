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
        //nem belépet user ellenőrzése
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // 1) űrlap felépítése
        $todo = new Todo();
        $form = $this->createForm(TodoType::class, $todo);

        // 2) submit kezelése
        $form->handleRequest($request);

        if ($form->isSubmitted() &&
            $form->isValid() &&
            $todo->getTaskName() !== '' &&
            $todo->getAction() == 'new'
          ) {
          $todo->setDeadline(new \DateTime('now'));
          $todo->setIsDone(false);

          $em = $this->getDoctrine()->getManager();
          $em->persist($todo);
          $em->flush();
        }

        if ($form->isSubmitted() &&
            $form->isValid() &&
            $todo->getAction() == 'update'
          ) {
          $em = $this->getDoctrine()->getManager();
          //megkeressűk a feladatot amit készre állítunk
          $updateTodo = $em->getRepository(Todo::class)->find($todo->getId());

          $updateTodo->setIsDone(true);
          $em->flush();
        }

        if ($form->isSubmitted() &&
            $form->isValid() &&
            $todo->getAction() == 'delete'
          ) {
          $em = $this->getDoctrine()->getManager();
          //megkeresi a törlendő feladatot
          $deleteTodo = $em->getRepository(Todo::class)->find($todo->getId());
          if ($deleteTodo) { //ha megtalálta akkor törli
            $em->remove($deleteTodo);
            $em->flush();
          }
        }

        $user = $this->getUser();
        //belépet felhasználó feladatainak a lekérése
        $todos = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->findBy(['userId' => $user->getId()]);


        return $this->render('todos.twig', [
          'todos' => $todos,
        ]);
    }
}
