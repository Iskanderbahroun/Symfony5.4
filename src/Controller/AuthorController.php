<?php

namespace App\Controller;
use App\Form\AuthorType;
use App\Entity\Author;
use App\Repository\AuthorRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class AuthorController extends AbstractController
{
    #[Route('/author/show/{name}', name: 'app_author_show')]
    public function showAuthor($name): Response
    {
        return $this->render('author/show.html.twig', [
            'name' => $name
        ]);
    }
    #[Route('/author/list', name: 'app_list')]
    public function list()
    {
        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
            );
            return $this->render('author/list.html.twig',['authors'=>$authors]);
    }
#[Route('/author/details/{id}', name: 'app_author_details')]
public function details($id){
    $authors = array(
        array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
        'victor.hugo@gmail.com ', 'nb_books' => 100),
        array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
        ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
        array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
        'taha.hussein@gmail.com', 'nb_books' => 300),
        );
        return $this->render('author/showauthor.html.twig', ['authors' =>$authors, 'id' =>$id]);

}
#[Route('/author/read', name: 'app_author_read')]
public function read(AuthorRepository $authorrepo)
{
    $authors = $authorrepo->findAll();
    return $this->render('author/read.html.twig', ['authors' => $authors]);


}
#[Route('/author/add', name: 'app_author_add')]
public function  Add (Request  $request,EntityManagerInterface $entityManager)
{
    $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->add('Ajouter', SubmitType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Utilisez l'EntityManager (via $entityManager) pour persister et flush l'entité
            $entityManager->persist($author);
            $entityManager->flush();

            return $this->redirectToRoute('app_author_read');
    }
    return $this->render('author/Add.html.twig',['f'=>$form->createView()]);

}

#[Route('/author/delete/{id}', name: 'delete_author')]
public function delete($id, AuthorRepository $repository,EntityManagerInterface $entityManager)
    {
        $author = $repository->find($id);

        if (!$author) {
            throw $this->createNotFoundException('Auteur non trouvé');
        }

        // Utilisez l'EntityManager (via $entityManager) pour supprimer l'entité
        $entityManager->remove($author);
        $entityManager->flush();

        return $this->redirectToRoute('app_author_read');
    }
    #[Route('/author/update/{id}', name: 'update_author')]
    public function edit(AuthorRepository $repository, $id, Request $request,EntityManagerInterface $entityManager)
    {
        $author = $repository->find($id);
    $form = $this->createForm(AuthorType::class, $author);
    $form->add('Edit', SubmitType::class);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        // Utilisez l'EntityManager (via $entityManager) pour enregistrer les modifications
        $entityManager->flush();

        return $this->redirectToRoute("app_author_read");
        }

        return $this->render('author/update.html.twig', [
            'f' => $form->createView(),
        ]);
    }
    #[Route('/author/trieQB', name: 'trieQB_author')]
    public function trieQB_author (AuthorRepository $authorrepo) {
        $authors = $authorrepo->trieQB();
        return $this->render('author/read.html.twig',['authors'=> $authors]);
       
          }
       
}