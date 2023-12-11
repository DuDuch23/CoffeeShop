<?php

namespace App\Controller\Admin;

use App\Entity\Slider;
use App\Form\SliderType;
use App\Repository\SliderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/sliders', name: 'admin_sliders_')]
class SliderController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function listSlider(SliderRepository $sliderRepository): Response
    {
        $sliders = $sliderRepository->findAll();

        return $this->render('admin/slider/slider.html.twig', [
            'sliders' => $sliders,
        ]);
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(Request $request, Slider $slider, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SliderType::class, $slider, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $entityManager->flush();

                return $this->redirectToRoute('admin_sliders_edit', [
                    'id' => $slider->getId(),
                ]);
            }
        }

        return $this->render('admin/slider/edit.html.twig', [
            'form' => $form,
            'slider' => $slider,
        ]);
    }
}