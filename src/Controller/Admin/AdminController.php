<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Form\AdminType;
use App\Repository\AdminRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admins', name: 'admin_users_admins_')]
class AdminController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function listAdmin(AdminRepository $adminRepository): Response
    {
        $admins = $adminRepository->findAll();

        return $this->render('admin/user_admin/user_admin.html.twig', [
            'admins' => $admins,
        ]);
    }

    #[Route(path: '/edit/{id}', name: 'edit')]
    public function edit(Request $request, Admin $admin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdminType::class, $admin, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $entityManager->flush();

                return $this->redirectToRoute('admin_users_admins_edit', [
                    'id' => $admin->getId(),
                ]);
            }
            else
            {
                $this->addFlash('error', 'Le formulaire contient des erreurs');
            }
        }

        return $this->render('admin/user_admin/edit.html.twig', [
            'form' => $form,
            'admin' => $admin,
        ]);
    }

    #[Route(path: '/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $admin = new Admin();
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $entityManager->persist($admin);
                $entityManager->flush();

                return $this->redirectToRoute('admin_users_admins_edit', [
                    'id' => $admin->getId(),
                ]);
            }
            else
            {
                $this->addFlash('error', 'Le formulaire contient des erreurs.');
            }
        }

        return $this->render('admin/user_admin/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route(path: '/delete/{id}', name: 'delete', methods: 'DELETE')]
    public function delete(Request $request, Admin $admin, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $token = $request->request->get('csrf_token');

        if (!$this->isCsrfTokenValid('delete-user_admin', $token)) {
            throw $this->createAccessDeniedException();
        }

        try {
            $entityManager->remove($admin);
            $entityManager->flush();
        } catch (\Exception $e) {
            $logger->error($e->getMessage());
            $this->addFlash('error', 'Impossible de supprimer l\'administrateur.');
        }

        return $this->redirectToRoute('admin_users_admins_index');
    }
}