<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            try
            {
                $entityManager->persist($contact);
                $entityManager->flush();

                $this->addFlash('Erreur', 'Message envoyé.');

                return $this->redirectToRoute('homepage');
            }
            catch(Exception $e)
            {
                return $this->redirectToRoute('contact', [
                    'erreur' => 'Erreur lors de l\'envoie du message.',
                ]);
            }
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
