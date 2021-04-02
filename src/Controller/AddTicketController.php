<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\TicketFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class AddTicketController extends AbstractController
{
    /**
     * @Route("/add/ticket", name="add_ticket")
     */
    public function addTicket(Request $request): Response
    {
        $ticket = new Ticket();
        $form = $this->createForm(TicketFormType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ticket);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }


        return $this->render('add_ticket/index.html.twig', [
            'ticket' => $form->createView(),
        ]);
    }
}
