<?php

namespace App\Controller\Admin;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/contacts', name: 'admin_contacts_')]
class ContactController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function listContact(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();

        return $this->render('admin/contact/contact.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}