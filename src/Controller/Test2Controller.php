<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Test2Controller extends AbstractController
{
    /**
     * @Route("/houida/{nom}/{prenom}/", name="houida")
     */
    public function houida($nom,$prenom)
    {
       
        return $this->render('test2/houida.html.twig', ['prenom'=>$prenom,'nom'=>$nom]);
    }
}
