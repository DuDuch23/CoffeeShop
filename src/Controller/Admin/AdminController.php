<?php

namespace App\Controller\Admin;

use App\Repository\AdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admins', name: 'admin_users_admins_')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function listAdmin(AdminRepository $adminRepository): Response
    {
        $admins = $adminRepository->findAll();

        return $this->render('admin/user_admin/user_admin.html.twig', [
            'admins' => $admins,
        ]);
    }
}