<?php

namespace App\Controller\Admin;

use App\Repository\AdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin/user_admin', name: 'admin_user_admin')]
    public function listAdmin(AdminRepository $adminRepository): Response
    {
        $admins = $adminRepository->findAll();

        return $this->render('admin/user_admin/user_admin.html.twig', [
            'admins' => $admins,
        ]);
    }
}