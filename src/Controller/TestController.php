<?php

namespace App\Controller;

namespace App\Controller;
use App\Form\TestType;
use App\Entity\Test;
use App\Repository\TestRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class TestController extends AbstractController
{
    #[Route('/Test/show/{name}', name: 'app_Test_show')]
    public function showTest($name): Response
    {
        return $this->render('Test/show.html.twig', [
            'name' => $name
        ]);
    }
    #[Route('/Test/list', name: 'app_list')]
    public function list()
    {
        $Tests = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
            );
            return $this->render('Test/list.html.twig',['Test'=>$Tests]);
    }
#[Route('/Test/details/{id}', name: 'app_Test_details')]
public function details($id){
    $Test = array(
        array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
        'victor.hugo@gmail.com ', 'nb_books' => 100),
        array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
        ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
        array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
        'taha.hussein@gmail.com', 'nb_books' => 300),
        );
        return $this->render('Test/showTest.html.twig', ['Test' =>$Test, 'id' =>$id]);

}
#[Route('/Test/read', name: 'app_Test_read')]
public function read(TestRepository $Testrepo)
{
    $Tests = $Testrepo->findAll();
    return $this->render('Test/read.html.twig', ['Tests' => $Tests]);


}
#[Route('/Test/add', name: 'app_Test_add')]
public function add(ManagerRegistry $doctrine , Request $request){
    $em = $doctrine->getManager();
    
    $Tests = new Test();
    $forms=$this->createForm(TestType::class,$Tests);
    $forms->handleRequest($request);
    if ($forms->isSubmitted()){
    $Tests->setTest(1);
    $Tests->setEmail("sa");
    $em->persist($Tests);
    $em->flush();
    return $this->redirectToRoute("app_Test_read");
} else{
    return $this->renderForm('Test/add.html.twig', ['f' => $forms]);
}
}

#[Route('/Test/delete/{id}', name: 'delete_Test')]
    public function delete(ManagerRegistry $doctrine, TestRepository $Testrep, $id)
    {
        $em = $doctrine->getManager();
        $Test = $Testrep->find($id);

        $em->remove($Test);
        $em->flush();

        return $this->redirectToRoute("app_Test_read");

    }
    #[Route('/Test/update/{id}', name: 'update_Test')]
    public function update(ManagerRegistry $doctrine, TestRepository $Testrep, Request $request, $id)
    {
        $Test = $Testrep->find($id);
        $em = $doctrine->getManager();
        $frm = $this->createForm(TestType::class, $Test);

        $frm->handleRequest($request);
        if ($frm->isSubmitted()) {
            $em->persist($Test);
            $em->flush();
            return $this->redirectToRoute("app_Test_read");
        }


        return $this->renderForm("Test/update.html.twig", ["frm" => $frm]);
    }
}
