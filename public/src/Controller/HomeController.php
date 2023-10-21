<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_homes')]
    public function home(): Response
    {
        return new response('
        <html>
            <body>
                <h1>Hello Symfony 5 World</h1>
            </body>
        </html>
    ');
    }


}

?>