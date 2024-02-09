<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Security\EmailVerifier;
use Symfony\Component\Mime\Address;
use App\Repository\ContactRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

class ContactController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }


    #[Route('/contact', name: 'app_contact')]
    public function index(ManagerRegistry $managerRegistry, UserInterface $user, Request $request, ContactRepository $contactRepository): Response
    {
        // dd($user);
        // $user = new User();
        $contact = new Contact();
        $formcontact = $this->createForm(ContactType::class, $contact);
        $formcontact->handleRequest($request);
        if ($formcontact->isSubmitted() && $formcontact->isValid()) {
            $om = $managerRegistry->getManager();
            $om->persist($contact);
            $om->flush();
            // test de lemail
            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation(
                'app_verify_email',
                $user,
                (new TemplatedEmail())
                    ->from($user->getEmail())
                    ->to(new Address('will.beyaert@gmail.com', 'Vincent'))

                    // ->to()
                    ->subject('Demande de contact')
                    ->htmlTemplate('contact/emailconfirmation.html.twig')
                    ->context([
                        'nom' => $contact->getNom(),
                        'prenom' => $contact->getPrenom(),
                        'question' => $contact->getQuestion(),
                        // 'email' => $contact->getEmail(),
                        // Ajoutez d'autres paramètres ici
                    ])
            );
            //  fin de test 
            return $this->redirectToRoute('app_home');
        }
        return $this->render('contact/index.html.twig', [

            'form' => $formcontact->createView()
        ]);
    }
}
