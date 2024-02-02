<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EvenementRepository;
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EvenementRepository $evenementRepository): Response
    {
        $evenements = $evenementRepository->findbyeventvalid(true);
        // dd($evenements);
        return $this->render('home/index.html.twig', [
            'evenements' => $evenements,
        ]);

        
        
    }

    

}
