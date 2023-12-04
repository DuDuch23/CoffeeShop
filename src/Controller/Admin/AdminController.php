<?php

namespace App\Controller\Admin;

use App\Repository\AdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin/userAdmin', name: 'admin_userAdmin')]
    public function listAdmin(AdminRepository $adminRepository): Response
    {
        $admins = $adminRepository->findAll();

        return $this->render('admin/userAdmin.html.twig', [
            'admins' => $admins,
        ]);
    }
}