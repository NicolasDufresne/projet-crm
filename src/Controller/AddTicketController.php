<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\TicketFormType;
use App\Repository\TicketRepository;
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
            $userid = $this->getUser();
            $ticket ->setUser($userid);
            $ticket ->setStatus(1);
            $entityManager->persist($ticket);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }


        return $this->render('add_ticket/index.html.twig', [
            'ticket' => $form->createView(),
        ]);
    }


    /**
     * @Route("/ticket/{id}", name="ticket")
     */
    public function Ticket(int $id, TicketRepository $ticketRepository) : Response {
        $ticket = $ticketRepository
            ->find($id);

        return  $this->render('add_ticket/ticket.html.twig',  [
            'ticket' => $ticket
        ]);

    }


    /**
     * @Route("/ticket", name="ticketAll")
     */
    public function TicketAll(TicketRepository $ticketRepository) : Response {

        $user = $this->getUser();
        if (empty($user)) {
            return $this->redirectToRoute('home');
        }
        $role = $user->getRoles();

        if ($role[0] === "ROLE_ADMIN") {
            $ticket = $ticketRepository
                ->findAll();
        } else if ($role[0] === "ROLE_USER") {
            $ticket = $ticketRepository
                ->findBy(['user' => $user]);
        }

        return  $this->render('add_ticket/ticketAll.html.twig',  [
            'ticket' => $ticket
        ]);

    }
}
