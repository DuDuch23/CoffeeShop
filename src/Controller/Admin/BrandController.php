<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use App\Form\BrandType;
use App\Repository\BrandRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route(path: '/edit/{id}', name: 'edit')]
    public function edit(Request $request, Brand $brand, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BrandType::class, $brand, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $entityManager->flush();

                return $this->redirectToRoute('admin_brands_edit', [
                    'id' => $brand->getId(),
                ]);
            }
            else
            {
                $this->addFlash('error', 'Le formulaire contient des erreurs');
            }
        }

        return $this->render('admin/brand/edit.html.twig', [
            'form' => $form,
            'brand' => $brand,
        ]);
    }

    #[Route(path: '/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $brand = new Brand();
        $form = $this->createForm(BrandType::class, $brand);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $entityManager->persist($brand);
                $entityManager->flush();

                return $this->redirectToRoute('admin_brands_edit', [
                    'id' => $brand->getId(),
                ]);
            }
            else
            {
                $this->addFlash('error', 'Le formulaire contient des erreurs.');
            }
        }

        return $this->render('admin/brand/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route(path: '/delete/{id}', name: 'delete', methods: 'DELETE')]
    public function delete(Request $request, Brand $brand, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $token = $request->request->get('csrf_token');

        if (!$this->isCsrfTokenValid('delete-brand', $token)) {
            throw $this->createAccessDeniedException();
        }

        try {
            $entityManager->remove($brand);
            $entityManager->flush();
        } catch (\Exception $e) {
            $logger->error($e->getMessage());
            $this->addFlash('error', 'Impossible de supprimer la marque.');
        }

        return $this->redirectToRoute('admin_brands_index');
    }

}