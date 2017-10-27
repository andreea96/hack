<?php

namespace AppBundle\Controller;

use AppBundle\Form\InfoFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //$userInfo=new InfoFormType();
        //$form=$this->createFormBuilder($userInfo)->getForm();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            //'form'=>$form->createView(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
