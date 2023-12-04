<?php

namespace App\Controller\Admin;

use App\Repository\BrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrandController extends AbstractController
{
    #[Route('/admin/brand', name: 'admin_brand')]
    public function listBrand(BrandRepository $brandRepository): Response
    {
        $brands = $brandRepository->findAll();

        return $this->render('admin/brand.html.twig', [
            'brands' => $brands,
        ]);
    }
}