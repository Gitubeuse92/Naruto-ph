<?php

namespace App\Controller;

use App\Controller\AccueilController;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil', methods ['GET'])]
    public function index(ArticleRepository $articles): Response
    {
        return $this->render('accueil/accueil.html.twig', [
            'articles' => $article->findAll(),
        ]);
    }
}
