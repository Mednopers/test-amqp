<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\CalculationDataFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class CalculationController extends AbstractController
{
    /**
     * @Route("/", methods={"GET", "POST"}, name="calculation_index")
     */
    public function index(Request $request, MessageBusInterface $bus): Response
    {
        $form = $this->createForm(CalculationDataFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $bus->dispatch($data);

            return $this->redirectToRoute('calculation_index');
        }

        return $this->render('calculation/index.html.twig', [
            'calculation_data_form' => $form->createView(),
        ]);
    }
}
