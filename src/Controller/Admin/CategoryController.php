<?php

namespace App\Controller\Admin;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}