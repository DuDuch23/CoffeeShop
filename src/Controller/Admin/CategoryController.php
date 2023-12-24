<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/categories', name: 'admin_categories_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function listCategory(CategoryRepository $categoryRepository): Response
    {
        $categorys = $categoryRepository->findAll();

        return $this->render('admin/category/category.html.twig', [
            'categorys' => $categorys,
        ]);
    }

    #[Route(path: '/edit/{id}', name: 'edit')]
    public function edit(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategoryType::class, $category, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $entityManager->flush();

                return $this->redirectToRoute('admin_categories_edit', [
                    'id' => $category->getId(),
                ]);
            }
            else
            {
                $this->addFlash('error', 'Le formulaire contient des erreurs');
            }
        }

        return $this->render('admin/category/edit.html.twig', [
            'form' => $form,
            'category' => $category,
        ]);
    }

    #[Route(path: '/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $entityManager->persist($category);
                $entityManager->flush();

                return $this->redirectToRoute('admin_categories_edit', [
                    'id' => $category->getId(),
                ]);
            }
            else
            {
                $this->addFlash('error', 'Le formulaire contient des erreurs.');
            }
        }

        return $this->render('admin/category/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route(path: '/delete/{id}', name: 'delete', methods: 'DELETE')]
    public function delete(Request $request, Category $category, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $token = $request->request->get('csrf_token');

        if (!$this->isCsrfTokenValid('delete-category', $token)) {
            throw $this->createAccessDeniedException();
        }

        try {
            $entityManager->remove($category);
            $entityManager->flush();
        } catch (\Exception $e) {
            $logger->error($e->getMessage());
            $this->addFlash('error', 'Impossible de supprimer la catégorie.');
        }

        return $this->redirectToRoute('admin_categories_index');
    }
}