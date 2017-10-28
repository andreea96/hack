<?php
/**
 * Created by PhpStorm.
 * User: andreea.olaru
 * Date: 10/27/2017
 * Time: 10:28 AM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="industry")
 */
class Industry
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */protected $id;
    /**
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * [getId description]
     * @ORM\OneToMany(targetEntity="Subindustry", mappedBy="Industry")
     */
    private $subindustries;

    /**
     * @return mixed
     */
    public function getSubindustries()
    {
        return $this->subindustries;
    }

    /**
     * @param mixed $subindustries
     */
    public function setSubindustries($subindustries)
    {
        $this->subindustries = $subindustries;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    function __toString()
    {
        return $this->name;
    }


}
