<?php

namespace App\Controller;


use App\Entity\Produit;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produits/{nom}/{prix}/{quantite}", name="produit")
     */
    public function add($nom,$prix,$quantite)
    {
        $produit=new Produit();
        $produit->setNom($nom);
        $produit->setPrix($prix);
        $produit->setQuantite($quantite);
        $produit->setDescription('description du livre....'.$nom);
        $produit->setImage($nom.'.jpg');
       
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->persist($produit);
        $entityManager->flush();


       
        return $this->render('produit/add.html.twig', ['produit'=>$produit]);
    }
     /**
     * @Route("/produits", name="produit_list")
     */
    public function list()
    {
        
        $produits=$this->getDoctrine()->getRepository(Produit::class)->findAll();
        //$produits=$this->getDoctrine()->getRepository(Produit::class)->chercheProduits();


       
        return $this->render('produit/list.html.twig', ['produits'=>$produits]);
    }
}
