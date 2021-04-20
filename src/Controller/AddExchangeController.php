<?php

namespace App\Controller;

use App\Entity\Exchange;
use App\Form\ExchangeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddExchangeController extends AbstractController
{
    /**
     * @Route("/add/exchange", name="add_exchange")
     */
    public function addExchange(Request $request) : Response {
        $exchange = new Exchange();
        $form = $this->createForm(ExchangeFormType::class, $exchange);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($exchange);
            $entityManager->flush();

            return $this->redirectToRoute('home');

        }

        return  $this->render('add_exchange/index.html.twig',  [
            'exchange' => $form->createView()
        ]);

    }
}
