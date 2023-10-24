<?php

namespace App\Controller;
use App\Form\FilmType;
use App\Entity\Film;
use App\Repository\FilmRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class FilmController extends AbstractController
{
    #[Route('/film', name: 'app_film')]
    public function index(): Response
    {
        return $this->render('film/index.html.twig', [
            'controller_name' => 'FilmController',
        ]);
    }
    #[Route('/Film/add', name: 'app_Film_add')]
public function  Add (Request  $request,EntityManagerInterface $entityManager)
{
    $Film = new Film();
        $form = $this->createForm(FilmType::class, $Film);
        $form->add('Ajouter', SubmitType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Utilisez l'EntityManager (via $entityManager) pour persister et flush l'entité
            $entityManager->persist($Film);
            $entityManager->flush();

            return $this->redirectToRoute('app_Film_read');
    }
    return $this->render('Film/Add.html.twig',['f'=>$form->createView()]);

}
}
