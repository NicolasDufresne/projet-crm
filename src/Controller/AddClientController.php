<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddClientController extends AbstractController
{
    /**
     * @Route("/add/client", name="add_client")
     */
    public function addClient(Request $request): Response
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('dashboard');
        }


        return $this->render('add_client/index.html.twig', [
            'client' => $form->createView(),
        ]);
    }


    /**
     * @Route("/client/{id}", name="client")
     */
    public function Client(int $id, ClientRepository $clientRepository) : Response {
        $client = $clientRepository
            ->find($id);

        return  $this->render('add_client/client.html.twig',  [
            'client' => $client
        ]);

    }

    /**
     * @Route("/client", name="clientAll")
     */
    public function AppointmentAll(ClientRepository $clientRepository) : Response {
        $client = $clientRepository
            ->findAll();

        return  $this->render('add_client/clientAll.html.twig',  [
            'client' => $client
        ]);

    }
}
