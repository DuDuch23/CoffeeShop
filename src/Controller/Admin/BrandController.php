<?php

namespace App\Controller\Admin;

use App\Repository\BrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/brands', name: 'admin_brands_')]
class BrandController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function listBrand(BrandRepository $brandRepository): Response
    {
        $brands = $brandRepository->findAll();

        return $this->render('admin/brand/brand.html.twig', [
            'brands' => $brands,
        ]);
    }
}