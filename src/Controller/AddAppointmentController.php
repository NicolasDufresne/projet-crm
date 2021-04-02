<?php

namespace App\Controller;
use App\Entity\Appointment;
use App\Form\AppointmentFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddAppointmentController extends AbstractController
{
    /**
     * @Route("/add/appointment", name="add_appointment")
     */
    public function addAppointment(Request $request) : Response {
        $appointment = new Appointment();
        $form = $this->createForm(AppointmentFormType::class, $appointment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($appointment);
            $entityManager->flush();

            return $this->redirectToRoute('home');

        }

        return  $this->render('add_appointment/index.html.twig',  [
            'appointment' => $form->createView()
        ]);

    }
}
