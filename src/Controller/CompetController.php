<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetController extends AbstractController
{
    #[Route('/compet', name: 'app_compet')]
    public function index(): Response
    {
        return $this->render('compet/index.html.twig', [
            'controller_name' => 'CompetController',
        ]);
    }
}
