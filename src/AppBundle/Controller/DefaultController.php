<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Subindustry;
use AppBundle\Entity\URL;
use AppBundle\Form\InfoFormType;
use AppBundle\Form\UserInfoType;
use AppBundle\Service\FormulaGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $formInfo=$this->createForm(InfoFormType::class);


        if ($request->get($formInfo->getName())) {
            $formInfo->handleRequest($request);}

        if($formInfo->isSubmitted() && $formInfo->isValid())
        {
           if(!$this->container->get('session')->isStarted())
           {
               $session=new Session();
               $session->start();
           }
           else $session=$this->container->get('session');

           $session->set('site', $formInfo->getData()['site']);
            //redlegare de servicie
            $session->set('trafficSM',$trafficSM = $formInfo->getData()['industrie']->getTrafficSM());
            $session->set('trafficGoogle',$googleTraffic = $formInfo->getData()['industrie']->getTrafficGoogle());
            $session->set('cos_mediu',$cos_mediu=$formInfo->getData()['industrie']->getCosMediu());
            $generator = new FormulaGenerator($trafficSM,$googleTraffic,$cos_mediu);
            $values=array();
            $values['traficPotentialGoogle']=$generator->getTrafficPotentialGoogle();
            $values['traficPotentialSM']=$generator->getTrafficPotentialSM();
            $values['traficPotentialTotal']=$generator->getTrafficPotentialTotal();
            $session->set('valueGeneratorObject',$generator);

            $url=new URL();
            $url->setUrl( $formInfo->getData()['site']);

            //persist to DB
            $em=$this->getDoctrine()->getManager();
            $em->persist($url);
            $em->flush();

            return $this->redirectToRoute('results');
        }



        return $this->render('default/infoForm.html.twig', [
            'form'=>$formInfo->createView(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);

    }

    public function resultsAction(Request $request)
    {
        $session=$this->container->get('session');
        $generator=$session->get('valueGeneratorObject');

        $userInfoForm=$this->createForm(UserInfoType::class);

        if ($request->get($userInfoForm->getName())) {
            $userInfoForm->handleRequest($request);
        }


        if($userInfoForm->isSubmitted() && $userInfoForm->isValid())
        {
            $user=$userInfoForm->getData();

            $em=$this->getDoctrine()->getManager();
            $em->persist($user);

            $em->flush();

            $this->addFlash('succes','Va vom contacta cat mai curand!');


        }
        return $this->render('default/userForm.html.twig',[
            'traficTotalGoogle'=>$generator->getTraficTotalGoogle(),
            'traficTotalSM'=>$generator->getTrafficTotalSM(),
            'traficPotentialGoogle'=>$generator->getTrafficPotentialGoogle(),
            'traficPotentialSM'=>$generator->getTrafficPotentialSM(),
            'traficPotentialTotal'=>$generator->getTrafficPotentialTotal(),
            'vanzariGoogle'=>$generator->getVanzaridinGoogle(),
            'vanzariSM'=>$generator->getVanzaridinSM(),
            'vanzariTotale'=>(int)$generator->getVanzariTotale(),
            'revenueGoogle'=>$generator->getRevenueGoogle(),
            'revenueSM'=>$generator->getRevenuedinSM(),
            'revenueTotal'=>(int)$generator->getRevenueTotal(),
            'userForm' => $userInfoForm->createView(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,

            ]);
    }
}
