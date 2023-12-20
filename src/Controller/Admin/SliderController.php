<?php

namespace App\Controller\Admin;

use App\Entity\Slider;
use App\Form\SliderType;
use App\Repository\SliderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/sliders', name: 'admin_sliders_')]
class SliderController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function listSlider(SliderRepository $sliderRepository): Response
    {
        $sliders = $sliderRepository->findAll();

        return $this->render('admin/slider/slider.html.twig', [
            'sliders' => $sliders,
        ]);
    }

    #[Route(path: '/edit/{id}', name: 'edit')]
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
            else
            {
                $this->addFlash('error', 'Le formulaire contient des erreurs');
            }
        }

        return $this->render('admin/slider/edit.html.twig', [
            'form' => $form,
            'slider' => $slider,
        ]);
    }

    #[Route(path: '/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $slider = new Slider();
        $form = $this->createForm(SliderType::class, $slider);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $entityManager->persist($slider);
                $entityManager->flush();

                return $this->redirectToRoute('admin_sliders_edit', [
                    'id' => $slider->getId(),
                ]);
            }
            else
            {
                $this->addFlash('error', 'Le formulaire contient des erreurs.');
            }
        }

        return $this->render('admin/slider/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route(path: '/delete/{id}', name: 'delete', methods: 'DELETE')]
    public function delete(Request $request, Slider $slider, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $token = $request->request->get('csrf_token');

        if (!$this->isCsrfTokenValid('delete-slider', $token)) {
            throw $this->createAccessDeniedException();
        }

        try {
            $entityManager->remove($slider);
            $entityManager->flush();
        } catch (\Exception $e) {
            $logger->error($e->getMessage());
            $this->addFlash('error', 'Impossible de supprimer le slider.');
        }

        return $this->redirectToRoute('admin_sliders_index');
    }
}