<?php
/**
 * Created by PhpStorm.
 * User: andreea.olaru
 * Date: 10/28/2017
 * Time: 1:44 AM
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Subindustry;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SubindustryRepository extends EntityRepository
{
    /**
     * @param $nameSubIndustry
     * @return array
     */
    public function findTraficGoogle($nameSubIndustry)
    {
        return $this->getEntityManager()->createQuery(
            'Select traffic_google from AppBundle:Subindustry si where si.name="'.$nameSubIndustry.'";'
        )->getResult();
    }
}