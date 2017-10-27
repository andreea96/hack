<?php
/**
 * Created by PhpStorm.
 * User: andreea.olaru
 * Date: 10/27/2017
 * Time: 4:44 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 */
class Subindustry
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
  protected $id;
  /**
   * @ORM\Column(type="string")
   */
  private $email;
  /**
   * @ORM\Column(type="string")
   */
  private $name;
  /**
   * @ORM\Column(type="string")
   */
  private $phone;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id){
    $this->id=$id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name){
    $this->name=$name;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email){
    $this->email=$email;
  }

  public function getPhone()
  {
    return $this->phone;
  }

  public function setPhone($phone){
    $this->phone=$phone;
  }

}
