<?php

namespace App\Controller\Admin;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/admin/contact', name: 'admin_contact')]
    public function listContact(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();

        return $this->render('admin/contact.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}