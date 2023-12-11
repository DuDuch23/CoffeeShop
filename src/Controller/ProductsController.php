<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\SliderRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class ProductsController extends AbstractController
{
    #[Route('/products', name: 'products', methods: ['GET'])]
    public function getProducts(Request $request, ProductRepository $productRepository): Response
    {
        $countProducts = $productRepository->count([]);
        $countPerPage = 10;

        $currentPage = $request->query->getInt('page',1);
        $countPages = ceil($countProducts / $countPerPage);

        // On vérifie que la page renseignée dans l'url est valide, si ce n'est pas le cas on génère une 404.
        if ($currentPage > $countPages || $currentPage <= 0) {
            throw $this->createNotFoundException();
        }
        
        $products = $productRepository->paginate('p', $currentPage, $countPerPage);

        return $this->render('products/index.html.twig', [
            'products'=> $products,
            'countPages' => $countPages,
            'currentPage' => $currentPage,
        ]);
    }
}
