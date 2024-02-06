<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, Contact $contact, ContactRepository $contactRepository): Response
    {

        $formcontact = $this->createForm(ContactType::class, $contact);
        $formcontact->handleRequest($request);
        if ($formcontact->isSubmitted() && $formcontact->isValid()) {
            $contactRepository->add($contact, true);
            return $this->redirectToRoute('app_home');
        }
        return $this->render('contact/index.html.twig',[
            'contact' =>$contact,
            'form' =>$formcontact->createView()
        ]);
    }
}
