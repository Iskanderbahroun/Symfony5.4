<?php

namespace App\Controller;
use App\Form\BookType;
use App\Entity\Book;
use App\Form\SearchType;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }
    #[Route('/Book/add', name: 'app_Book_add')]
public function  Add (Request  $request,EntityManagerInterface $entityManager)
{
    $Book = new Book();
        $form = $this->createForm(BookType::class, $Book);
        $form->add('Ajouter', SubmitType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Utilisez l'EntityManager (via $entityManager) pour persister et flush l'entité
            $entityManager->persist($Book);
            $entityManager->flush();

            return $this->redirectToRoute('app_Book_read');
    }
    return $this->render('Book/Add.html.twig',['f'=>$form->createView()]);

}
#[Route('/Book/read', name: 'app_Book_read')]
public function read(BookRepository $Bookrepo)
{
    $Book= $Bookrepo->findAll();
    return $this->render('Book/read.html.twig', ['Book' => $Book]);


}
#[Route('/Book/delete/{id}', name: 'delete_Book')]
public function delete($id, BookRepository $repository,EntityManagerInterface $entityManager)
    {
        $Book = $repository->find($id);

        if (!$Book) {
            throw $this->createNotFoundException('Auteur non trouvé');
        }

        // Utilisez l'EntityManager (via $entityManager) pour supprimer l'entité
        $entityManager->remove($Book);
        $entityManager->flush();

        return $this->redirectToRoute('app_Book_read');
    }
    #[Route('/Book/update/{id}', name: 'update_Book')]
    public function edit(BookRepository $repository, $id, Request $request,EntityManagerInterface $entityManager)
    {
        $Book = $repository->find($id);
    $form = $this->createForm(BookType::class, $Book);
    $form->add('Edit', SubmitType::class);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        // Utilisez l'EntityManager (via $entityManager) pour enregistrer les modifications
        $entityManager->flush();

        return $this->redirectToRoute("app_Book_read");
        }

        return $this->render('Book/update.html.twig', [
            'f' => $form->createView(),
        ]);
    }
    #[Route('/Book/search', name: 'searchQB_Book')]
    public function searchBook(Request $request,BookRepository $bookRepository): Response
    {   $book=new Book();
        $form=$this->createForm(SearchType::class,$book);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            return $this->render('book/search.html.twig', [
                'books' => $bookRepository->searchQB($book->getTitle()),
                'f'=>$form->createView()
            ]);
        }
if($form->isSubmitted()){
            return $this->render('book/search.html.twig', [
                'books' => $bookRepository->searchQB($book->getTitle()),
                'f'=>$form->createView()
            ]);
        }
        return $this->render('book/search.html.twig', [
            'books' => $bookRepository->findAll(),
            'f'=>$form->createView()
        ]);
    }
    #[Route('/Book/triTitle', name: "triTitle")]
    public function triTitle(BookRepository $rep)
    {
        $books = $rep->triTitle();
        return $this->render("book/read.html.twig", [
            "Book" => $books,
        ]);
    }
}
