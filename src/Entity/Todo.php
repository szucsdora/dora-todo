<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TodoRepository")
 * @ORM\Table(name="todos")
 */
class Todo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
     public function getId()
     {
       return $this->id;
     }
     public function setId($id)
    {
        $this->id = $id;
    }
     /**
      * @ORM\Column(type="integer", length=11, name="user_id")
      */
    private $userId;
    public function getUserId()
    {
      return $this->userId;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    /**
     * @ORM\Column(type="string", length=64, name="task_name")
     */
   private $taskName;
   public function getTaskName()
   {
     return $this->taskName;
   }
   public function setTaskName($task_name)
   {
     $this->taskName = $task_name;
   }
   /**
    * @ORM\Column(type="string", length=256, name="description")
    */
    private $taskDescription;
    public function getTaskDescription()
    {
      return $this->taskDescription;
    }
    public function setTaskDescription($taskDescription)
    {
      $this->taskDescription = $taskDescription;
    }
   /**
    * @ORM\Column(type="datetime", name="deadline")
    */
    private $deadline;
    public function getDeadline()
    {
      return $this->deadline;
    }
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }
    private $plainDeadline;
    public function getPlainDeadline()
    {
      return $this->plainDeadline;
    }
    public function setPlainDeadline($deadline)
    {
        $this->plainDeadline = $deadline;
    }
   /**
    * @ORM\Column(type="boolean", length=1, name="is_done")
    */
  private $isDone;
  public function getIsDone()
  {
    return $this->isDone;
  }
  public function setIsDone($isDone)
    {
        $this->isDone = $isDone;
    }

    private $action;
    public function getAction()
    {
      return $this->action;
    }
    public function setAction($action)
      {
          $this->action = $action;
      }
}
