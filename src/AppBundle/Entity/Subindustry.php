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
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubindustryRepository")
 * @ORM\Table(name="subindustry")
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
    private $name;
    /**
     * @ORM\Column(type="integer")
     * @return [type] [description]
     */
    private $trafficSM;

    /**
     * @ORM\Column(type="integer")
     */
    private $cos_mediu;
    /**
     * @ORM\Column(type="integer")
     * @return [type] [description]
     */
    private $trafficGoogle;
    /**
     * @ORM\ManyToOne(targetEntity="Industry")
     */
    private $industry;

    /**
     * @return mixed
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * @param mixed $industry
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;
    }
    /**
     * @return mixed
     */
    public function getTrafficSM()
    {
        return $this->trafficSM;
    }

    /**
     * @param mixed $trafficSM
     */
    public function setTrafficSM($trafficSM)
    {
        $this->trafficSM = $trafficSM;
    }

    /**
     * @return mixed
     */
    public function getTrafficGoogle()
    {
        return $this->trafficGoogle;
    }

    /**
     * @param mixed $trafficGoogle
     */
    public function setTrafficGoogle($trafficGoogle)
    {
        $this->trafficGoogle = $trafficGoogle;
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


    public function __toString()
    {
        if($this->name)
            return $this->name;
        return 'n/a';
    }

    /**
     * @return mixed
     */
    public function getCosMediu()
    {
        return $this->cos_mediu;
    }

    /**
     * @param mixed $cos_mediu
     */
    public function setCosMediu($cos_mediu)
    {
        $this->cos_mediu = $cos_mediu;
    }

}
