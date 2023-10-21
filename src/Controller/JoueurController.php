<?php

namespace App\Controller;

use App\Form\JoueurType;
use App\Entity\Joueur;
use App\Repository\JoueurRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class JoueurController extends AbstractController
{
    #[Route('/joueur', name: 'app_joueur')]
    public function index(): Response
    {
        return $this->render('joueur/index.html.twig', [
            'controller_name' => 'JoueurController',
        ]);
    }
    #[Route('/joueur/add', name: 'app_joueur_add')]
public function  Add (Request  $request,EntityManagerInterface $entityManager)
{
    $Joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $Joueur);
        $form->add('Ajouter', SubmitType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Utilisez l'EntityManager (via $entityManager) pour persister et flush l'entité
            $entityManager->persist($Joueur);
            $entityManager->flush();

            return $this->redirectToRoute('app_joueur_read');
    }
    return $this->render('Joueur/Add.html.twig',['frm'=>$form->createView()]);

}
}
