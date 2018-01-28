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
      * @ORM\Column(type="integer", length=11, name="user_id"))
      * @ORM\ManyToOne(targetEntity="User")
      */
    private $userId;
    public function getUserId()
    {
      return $this->user_id;
    }
    public function setUserName($user_id)
    {
        $this->userName = $user_name;
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
    * @ORM\Column(type="datetime", name="date")
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
        $this->$isDone = $isDone;
    }
}
