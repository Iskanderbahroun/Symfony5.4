<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IskanderController extends AbstractController
{
    #[Route('/iskander', name: 'app_iskander')]
    public function index(): Response
    {
        return $this->render('iskander/index.html.twig', [
            'controller_name' => 'IskanderController',
        ]);
    }
}
