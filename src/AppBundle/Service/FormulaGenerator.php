<?php
/**
 * Created by PhpStorm.
 * User: andreea.olaru
 * Date: 10/28/2017
 * Time: 1:17 AM
 */

namespace AppBundle\Service;


class FormulaGenerator
{

    private $traficSM;
    private $traficGoogle;
    private $cos_mediu;

    /**
     * FormulaGenerator constructor.
     * @param $industrie
     */
    public function __construct($traficSM,$traficGoogle,$cos_mediu)
    {

        $this->traficGoogle=$traficGoogle;
        $this->traficSM=$traficSM;
        $this->cos_mediu=$cos_mediu;
    }


    public function getTraficTotalGoogle(){
        return $this->traficGoogle;
    }

    public function getTrafficTotalSM(){
        return $this->traficSM;
    }

    public function getTrafficPotentialGoogle(){

        return $this->traficGoogle*0.25;
    }

    public function getTrafficPotentialSM(){
            return $this->getTrafficTotalSM()*0.1;
    }

    public function getTrafficPotentialTotal(){
            return $this->getTrafficPotentialGoogle()+$this->getTrafficPotentialSM();
    }

    public function getVanzaridinGoogle(){
        return 0.015*$this->getTrafficPotentialGoogle();
    }
    public function getVanzaridinSM(){
        return 0.015*$this->getTrafficPotentialSM();
    }
    public function getVanzariTotale()
    {
        return $this->getVanzaridinGoogle()+$this->getVanzaridinSM();
    }
    public function getRevenueGoogle()
    {

        return $this->getVanzaridinGoogle()*$this->cos_mediu;
    }
    public function getRevenuedinSM()
    {
        return $this->getVanzaridinSM()*$this->cos_mediu;
    }
    public function getRevenueTotal()
    {
        return $this->getRevenueGoogle()+$this->getRevenuedinSM();
    }


}