<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TodoRepository")
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
      */
    private $userId;
    public function getuserId()
    {
      return $this->user_id;
    }
    public function setuserName($user_id)
    {
        $this->userName = $user_name;
    }
    /**
     * @ORM\Column(type="string", length=64, name="task_name")
     */
   private $taskName;
   public function gettaskName()
   {
     return $this->task_name;
   }
   public function settaskName($task_name)
    {
        $this->taskName = $task_name;
    }
   /**
    * @ORM\Column(type="dateTime", name="deadline")
    */
  private $deadline;
  public function getdeadline()
  {
    return $this->deadline;
  }
  public function setdeadline($deadline)
    {
        $this->deadline = $deadline;
    }
   /**
    * @ORM\Column(type="boolean", length=1, name="is_done")
    */
  private $isDone;
  public function getisDone()
  {
    return $this->is_done;
  }
  public function setName($isDone)
    {
        $this->$isDone = $is_done;
    }
}
