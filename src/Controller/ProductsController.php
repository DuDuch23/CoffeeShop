<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'products', methods: ['GET'])]
    public function getProducts(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        // $products = $entityManager->getRepository(Product::class)->findAll();

        // if(null === $products) 
        // {
        //     throw new NotFoundHttpException();
        // }

        // $products = new Product();
        // $products->setName("Macchiato");
        // $products->setDescription("test");
        // $products->setPrice(10);
        // $products->setNote(10);
        // $products->setFamily("Epicée");
        // $products->setCountry("Italie");

        // $category = new Category();
        // $category->setName("café en grain");
        // $products->setNameCategory($category);

        // $brand = new Brand();
        // $brand->setName("Marque locale");
        // $products->setNameBrand($brand);

        // $products = [
        //     [
        //         'picture' => ('media/macchiato.jpeg'),
        //         'name' => 'Macchiato',
        //         'price'=> 5,
        //         'note'=> '10/10',
        //         'family'=> 'family1',
        //         'country'=> 'Italie',
        //         'bestSeller'=> true,
        //     ],
        //     [
        //         'picture' => ('media/cafe-noir.jpeg'),
        //         'name' => 'Café Noir',
        //         'price'=> 3.5,
        //         'note'=> '8/10',
        //         'family'=> 'family2',
        //         'country'=> 'France',
        //         'bestSeller'=> true,
        //     ],
        //     [
        //         'picture' => ('media/cappuccino.jpeg'),
        //         'name' => 'Cappuccino',
        //         'price'=> 4,
        //         'note'=> '8/10',
        //         'family'=> 'family3',
        //         'country'=> 'Autriche',
        //         'bestSeller'=> false,
        //     ],
        //     [
        //         'picture' => ('media/latte.jpg'),
        //         'name' => 'Latte',
        //         'price'=> 2.5,
        //         'note'=> '7.5/10',
        //         'family'=> 'family4',
        //         'country'=> 'Angleterre',
        //         'bestSeller'=> false,
        //     ],
        //     [
        //         'picture' => ('media/latte.jpg'),
        //         'name' => 'Latte Macchiato',
        //         'price'=> 7.5,
        //         'note'=> '9/10',
        //         'family'=> 'family5',
        //         'country'=> 'Italie',
        //         'bestSeller'=> true,
        //     ],
        //     [
        //         'picture' => ('media/american-coffee.webp'),
        //         'name' => 'American Coffee',
        //         'price'=> 3.5,
        //         'note'=> '7/10',
        //         'family'=> 'family6',
        //         'country'=> 'Amérique',
        //         'bestSeller'=> false,
        //     ],
        // ];

        // $entityManager->persist($products);

        // $entityManager->flush();

        return $this->render('products/index.html.twig', [
            'products'=> $products,
            // 'product_name' => $products->getName(),
            // 'product_description' => $products->getDescription(),
            // 'product_price' => $products->getPrice(),
            // 'product_note' => $products->getNote(),
            // 'product_family' => $products->getFamily(),
            // 'product_country' => $products->getCountry(),
            // 'product_nameCategory' => $products->getNameCategory(),
            // 'product_nameBrand' => $products->getNameBrand(),
            // 'reponse' => new Response("test : " . $products->getId()),
        ]);
    }
}
