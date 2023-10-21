<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    #[Route('/service/show/{name}', name: 'app_service_show')]
    public function showService($name): Response
    {
        return $this->render('service/index.html.twig' , [
            'name' => $name 
        ]);
    }
}