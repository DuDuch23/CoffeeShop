<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function home(): Response
    {
        $sliders = [
            [
                'picture' => 'url(/media/background-coffee1.jpg)',
                'title' => 'title1',
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s 
                standard dummy text ever since the 1500s',
                'button' => 'Learn More',
            ],
            [
                'picture' => 'url(/media/background-coffee2.jpg)',
                'title' => 'title2',
                'content' => 'Découvrez l\'art du café avec notre sélection exquise de grains soigneusement torréfiés. Plongez dans 
                une expérience sensorielle riche, où l\'arôme envoûtant et le goût profond se marient dans chaque gorgée. Nos cafés, 
                issus des meilleures plantations du monde, sont méticuleusement sélectionnés pour vous offrir une pause café inoubliable.',
                'button' => 'Learn More',
            ],
            [
                'picture' => 'url(/media/background-coffee3.jpg)',
                'title' => 'title3',
                'content' => 'Laissez-vous séduire par la passion du café, de la plantation à la tasse. Explorez des saveurs uniques, 
                des notes subtiles et des profils de torréfaction équilibrés qui éveilleront vos sens. Que vous soyez amateur de cafés corsés, 
                d\'espressos intenses ou de délices aromatisés, notre collection saura satisfaire les palais les plus exigeants.',
                'button' => 'Learn More',
            ],
        ];

        $tendencyProducts = [
            [
                'picture' => ('media/macchiato.jpeg'),
                'name' => 'Macchiato',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
            ],
            [
                'picture' => ('media/cafe-noir.jpeg'),
                'name' => 'Café Noir',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
            ],
            [
                'picture' => ('media/cappuccino.jpeg'),
                'name' => 'Cappuccino',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
            ],
            [
                'picture' => ('media/macchiato.jpeg'),
                'name' => 'Macchiato',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
            ],
        ];

        $serviceQualitys = [
            [
                'pictureCoffeeLike' => ('media/cafe-noir.jpeg'),
                'nameCoffeeLike' => 'Café Noir',
                'picturePeople' => ('media/people1.jpg'),
                'content' => 'J\'ai adoré gouté le café noir',
            ],
            [
                'pictureCoffeeLike' => ('media/cappuccino.jpeg'),
                'nameCoffeeLike' => 'Cappuccino',
                'picturePeople' => ('media/people2.jpg'),
                'content' => 'J\'ai adoré gouté le cappuccino, je reviendrais !',
            ],
        ];

        return $this->render('home_page/index.html.twig', [
            'sliders'=> $sliders,
            'tendencyProducts' => $tendencyProducts,
            'serviceQualitys' => $serviceQualitys,
        ]);
    }
}
