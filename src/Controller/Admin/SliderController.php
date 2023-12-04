<?php

namespace App\Controller\Admin;

use App\Repository\SliderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SliderController extends AbstractController
{
    #[Route('/admin/slider', name: 'admin_slider')]
    public function listSlider(SliderRepository $sliderRepository): Response
    {
        $sliders = $sliderRepository->findAll();

        return $this->render('admin/slider.html.twig', [
            'sliders' => $sliders,
        ]);
    }
}