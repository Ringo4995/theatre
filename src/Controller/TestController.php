<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/testindex', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }


    #[Route('/test', name: 'test')]
    public function test()
    {
        return $this->render('test/test.html.twig');
    }

    #[Route('/test2', name: 'test2')]
    public function test2()
    {
        return $this->render('test/test2.html.twig');
    }
}
