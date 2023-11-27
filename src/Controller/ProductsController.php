<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function getProducts(EntityManagerInterface $entityManager): Response
    {
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

        $products = [
            [
                'picture' => ('media/macchiato.jpeg'),
                'name' => 'Macchiato',
                'price'=> 5,
                'note'=> '10/10',
                'family'=> 'family1',
                'country'=> 'Italie',
            ],
            [
                'picture' => ('media/cafe-noir.jpeg'),
                'name' => 'Café Noir',
                'price'=> 3.5,
                'note'=> '8/10',
                'family'=> 'family2',
                'country'=> 'France',
            ],
            [
                'picture' => ('media/cappuccino.jpeg'),
                'name' => 'Cappuccino',
                'price'=> 4,
                'note'=> '8/10',
                'family'=> 'family3',
                'country'=> 'Autriche',
            ],
            [
                'picture' => ('media/latte.jpg'),
                'name' => 'Latte',
                'price'=> 2.5,
                'note'=> '7.5/10',
                'family'=> 'family4',
                'country'=> 'Angleterre',
            ],
            [
                'picture' => ('media/latte.jpg'),
                'name' => 'Latte Macchiato',
                'price'=> 7.5,
                'note'=> '9/10',
                'family'=> 'family5',
                'country'=> 'Italie',
            ],
            [
                'picture' => ('media/american-coffee.webp'),
                'name' => 'American Coffee',
                'price'=> 3.5,
                'note'=> '7/10',
                'family'=> 'family6',
                'country'=> 'Amérique',
            ],
        ];

        // $entityManager->persist($products);

        // $entityManager->flush();

        return $this->render('products/index.html.twig', [
            'products'=> $products,
            // 'product_name' => $products->getName(),
            // 'reponse' => new Response("test : " . $products->getId()),
        ]);
    }
}
