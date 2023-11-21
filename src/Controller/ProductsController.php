<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function getProducts(): Response
    {
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

        return $this->render('products/index.html.twig', [
            'products'=> $products
        ]);
    }
}
