<?php

namespace App\Controller;

use App\Entity\Exchange;
use App\Form\ExchangeFormType;
use App\Repository\ExchangeRepository;
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
            $userid = $this->getUser();
            $exchange ->setUser($userid);
            $entityManager->persist($exchange);
            $entityManager->flush();

            return $this->redirectToRoute('home');

        }

        return  $this->render('add_exchange/index.html.twig',  [
            'exchange' => $form->createView()
        ]);

    }

    /**
     * @Route("/exchange/{id}", name="exchange")
     */
    public function Exchange(int $id, ExchangeRepository $exchangeRepository) : Response {
        $exchange = $exchangeRepository
            ->find($id);

        return  $this->render('add_exchange/exchange.html.twig',  [
            'exchange' => $exchange
        ]);

    }

    /**
     * @Route("/exchange", name="exchangeAll")
     */
    public function ExchangeAll(ExchangeRepository $exchangeRepository) : Response {

        $user = $this->getUser();
        if (empty($user)) {
            return $this->redirectToRoute('home');
        }
        $role = $user->getRoles();

        if ($role[0] === "ROLE_ADMIN") {
            $exchange = $exchangeRepository
                ->findAll();
        } else if ($role[0] === "ROLE_USER") {
            $exchange = $exchangeRepository
                ->findBy(['user' => $user]);
        }

        return  $this->render('add_exchange/exchangeAll.html.twig',  [
            'exchange' => $exchange
        ]);

    }
}
