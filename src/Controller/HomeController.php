<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EvenementRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        EvenementRepository $evenementRepository,
        PaginatorInterface $paginatorInterface,
        Request $request
    ): Response {
        $data = $evenementRepository->findbyeventvalid(true);
        $evenements = $paginatorInterface->paginate(
            $data,
            $request->query->getInt('page', 1),
            3
        );

        // dd($evenements);
        return $this->render('home/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }



    #[Route('/histoire', name: 'app_histoire')]
    public function histoire()
    {
        return $this->render('home/histoire.html.twig');
    }

    #[Route('/profil', name: 'profil')]
    public function profil(UserInterface $user)
    {


        return $this->render('home/profil.html.twig', [
            "utilisateur" => $user
        ]);
    }

    #[Route('ensavoir/{id}', name: 'ensavoir')]
    public function ensavoir(EvenementRepository $evenementRepository, $id){
        $evenement = $evenementRepository->find($id);
        return $this->render('evenement/ensavoir.html.twig', [
            "evenement" => $evenement
        ]);
    }

    #[Route("construction", name:"en_construction")]
    public function vroum(): Response
    {
        return $this->render('test/construction.html.twig');
    }
}
