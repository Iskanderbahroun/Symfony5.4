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
public function add(ManagerRegistry $doctrine , Request $request){
    $em = $doctrine->getManager();
    
    $authors = new Author();
    $forms=$this->createForm(AuthorType::class,$authors);
    $forms->handleRequest($request);
    if ($forms->isSubmitted()){
    $authors->setUserName("Hia");
    $authors->setEmail("sa");
    $em->persist($authors);
    $em->flush();
    return $this->redirectToRoute("app_author_read");
} else{
    return $this->renderForm('author/add.html.twig', ['f' => $forms]);
}
}

#[Route('/author/delete/{id}', name: 'delete_author')]
    public function delete(ManagerRegistry $doctrine, AuthorRepository $authorrep, $id)
    {
        $em = $doctrine->getManager();
        $author = $authorrep->find($id);

        $em->remove($author);
        $em->flush();

        return $this->redirectToRoute("app_author_read");

    }
    #[Route('/author/update/{id}', name: 'update_author')]
    public function update(ManagerRegistry $doctrine, AuthorRepository $authorrep, Request $request, $id)
    {
        $author = $authorrep->find($id);
        $em = $doctrine->getManager();
        $frm = $this->createForm(AuthorType::class, $author);

        $frm->handleRequest($request);
        if ($frm->isSubmitted()) {
            $em->persist($author);
            $em->flush();
            return $this->redirectToRoute("app_author_read");
        }


        return $this->renderForm("author/update.html.twig", ["frm" => $frm]);
    }
}