<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CatégorieRepository;
use App\Entity\Categorie;
use App\Form\CategorieType;

class CategorieController extends AbstractController
{
    #[Route('/liste-categorie', name: 'app_liste_categories')]
    public function listeCategorie(CategorieRepository $categorieRepository): Response
    {
    $categorie = $categorieRepository->findAll();
    return $this->render('categorie/liste-categorie.html.twig', [
        'categories' => $categories
   
    ]);
    }
}

{
    #[Route('/private-modifier-categorie', name: 'app_modifier_categorie')]
    function modifierCategorie(): Response
    {
        
        return $this->render('categorie/modifierCategorie.html.twig', [
        ]);
    }
}
