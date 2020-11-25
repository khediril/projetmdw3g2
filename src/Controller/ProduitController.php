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
      /**
     * @Route("/chercher/produits/{pmin}/{pmax}", name="produit_chercher")
     */
    public function chercherParPrix($pmin,$pmax)
    {
        
        $produits=$this->getDoctrine()->getRepository(Produit::class)->chercherParPrix($pmin,$pmax);
        //$produits=$this->getDoctrine()->getRepository(Produit::class)->chercheProduits();


       
        return $this->render('produit/list.html.twig', ['produits'=>$produits]);
    }
    /**
     * @Route("/produits/{id}", name="produit_show")
     */
    public function show($id)
    {
        
        $produit=$this->getDoctrine()->getRepository(Produit::class)->find($id);
        //$produits=$this->getDoctrine()->getRepository(Produit::class)->chercheProduits();


       
        return $this->render('produit/show.html.twig', ['prod'=>$produit]);
    }
    /**
     * @Route("/produits/delete/{id}", name="produit_delete")
     */
    public function delete($id)
    {
        
        $produit=$this->getDoctrine()->getRepository(Produit::class)->find($id);
        //$produits=$this->getDoctrine()->getRepository(Produit::class)->chercheProduits();
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($produit);
        $entityManager->flush();

       
        //return $this->render('produit/delete.html.twig', ['prod'=>$produit]);
        return $this->redirectToRoute("produit_list");
    }
    /**
     * @Route("/modifier/produits/{id}/{nprix}", name="produit_modifier")
     */
    public function modifier($id,$nprix)
    {
        
        $produit=$this->getDoctrine()->getRepository(Produit::class)->find($id);
        //$produits=$this->getDoctrine()->getRepository(Produit::class)->chercheProduits();
        $produit->setPrix($nprix);
        
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->persist($produit);// facultatif
        $entityManager->flush();

       
        //return $this->render('produit/delete.html.twig', ['prod'=>$produit]);
        return $this->redirectToRoute("produit_list");
    }
}
