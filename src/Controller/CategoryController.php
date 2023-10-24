<?php

namespace App\Controller;

use App\Form\CategoryType;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
    #[Route('/category/read', name: 'app_category_read')]
public function read(CategoryRepository $categoryrrepo)
{
    $category = $categoryrrepo->findAll();
    return $this->render('category/read.html.twig', ['category' => $category]);


}
#[Route('/category/add', name: 'app_category_add')]
public function  Add (Request  $request,EntityManagerInterface $entityManager)
{
    $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->add('Ajouter', SubmitType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Utilisez l'EntityManager (via $entityManager) pour persister et flush l'entité
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('app_category_read');
    }
    return $this->render('category/Add.html.twig',['f'=>$form->createView()]);

}

}
