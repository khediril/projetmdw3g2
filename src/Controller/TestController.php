<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    
    public function index1()
    {
        $tab=['mohamed','salah','ahmed','foulen'];
       
        $response=$this->render('test/index11.html.twig', ['liste'=>$tab]);
        
        return $response;
    }
    /**
     * @Route("/test2", name="test2")
     */
    public function index2()
    {
        return $this->render('test/index2.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
