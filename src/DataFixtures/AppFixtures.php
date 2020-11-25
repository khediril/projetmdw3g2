<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=1;$i<15;$i++)
        { 
        $product = new Produit();
         $product->setNom("produit".$i);
         $product->setPrix(100);
         $product->setQuantite(10);
         $product->setImage("photo".$i.".jpg");
         $product->setDescription("description du produit".$i);
         $manager->persist($product);
        }
        $manager->flush();
    }
}
