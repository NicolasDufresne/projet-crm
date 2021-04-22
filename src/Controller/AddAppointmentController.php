<?php

namespace App\Controller;
use App\Entity\Appointment;
use App\Entity\User;
use App\Form\AppointmentFormType;
use App\Repository\AppointmentRepository;
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
            $userid = $this->getUser();
            $appointment ->setUserId($userid);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($appointment);
            $entityManager->flush();

            return $this->redirectToRoute('home');

        }

        return  $this->render('add_appointment/index.html.twig',  [
            'appointment' => $form->createView()
        ]);

    }

    /**
     * @Route("/appointment/{id}", name="appointment")
     */
    public function Appointment(int $id, AppointmentRepository $appointmentRepository) : Response {
        $appointment = $appointmentRepository
            ->find($id);

        return  $this->render('add_appointment/appointment.html.twig',  [
            'appointment' => $appointment
        ]);

    }

    /**
     * @Route("/appointment", name="appointmentAll")
     */
    public function AppointmentAll(AppointmentRepository $appointmentRepository) : Response {

        $user = $this->getUser();
        if (empty($user)) {
            return $this->redirectToRoute('home');
        }
        $role = $user->getRoles();

        if ($role[0] === "ROLE_ADMIN") {
            $appointment = $appointmentRepository
                ->findAll();
        } else if ($role[0] === "ROLE_USER") {
            $appointment = $appointmentRepository
                ->findBy(['user_id' => $user]);
        }

        return  $this->render('add_appointment/appointmentAll.html.twig',  [
            'appointment' => $appointment
        ]);

    }
}
