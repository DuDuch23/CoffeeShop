<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/products', name: 'admin_products_')]
class ProductsController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function listProducts(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('admin/products/products.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route(path: '/edit/{id}', name: 'edit')]
    public function edit(Request $request, Product $product, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProductType::class, $product, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $entityManager->flush();

                return $this->redirectToRoute('admin_products_edit', [
                    'id' => $product->getId(),
                ]);
            }
            else
            {
                $this->addFlash('error', 'Le formulaire contient des erreurs');
            }
        }

        return $this->render('admin/products/edit.html.twig', [
            'form' => $form,
            'product' => $product,
        ]);
    }

    #[Route(path: '/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $entityManager->persist($product);
                $entityManager->flush();

                return $this->redirectToRoute('admin_products_edit', [
                    'id' => $product->getId(),
                ]);
            }
            else
            {
                $this->addFlash('error', 'Le formulaire contient des erreurs.');
            }
        }

        return $this->render('admin/products/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route(path: '/delete/{id}', name: 'delete', methods: 'DELETE')]
    public function delete(Request $request, Product $product, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $token = $request->request->get('csrf_token');

        if (!$this->isCsrfTokenValid('delete-product', $token)) {
            throw $this->createAccessDeniedException();
        }

        try {
            $entityManager->remove($product);
            $entityManager->flush();
        } catch (\Exception $e) {
            $logger->error($e->getMessage());
            $this->addFlash('error', 'Impossible de supprimer le produit.');
        }

        return $this->redirectToRoute('admin_products_index');
    }
}