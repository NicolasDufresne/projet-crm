<?php

namespace App\Controller;
use App\Entity\Appointment;
use App\Entity\User;
use App\Form\AppointmentFormType;
use App\Repository\AppointmentRepository;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class AddAppointmentController extends AbstractController
{
    /**
     * @Route("/add/appointment", name="add_appointment")
     */
    public function addAppointment(Request $request, MailerInterface $mailer) : Response {
        $appointment = new Appointment();
        $form = $this->createForm(AppointmentFormType::class, $appointment);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $userid = $this->getUser();
            $appointment ->setUserId($userid);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($appointment);
            $entityManager->flush();

            $dateString = $appointment->getDateTime()->format('Y-m-d H:i:s');
            $user = $this->getUser();
            $userEmail = $user->getUsername();

            //mail for the user
            $email = (new Email())
                ->from('projet.crm.nfactory.NDBBLF@gmail.com')
                ->to($userEmail)
                ->subject('Une nouvelle réunion dont vous êtes membre à été définie')
                ->text($appointment->getObject() . ' ' . $dateString)
                ->html('<h1>Réunion définie le : ' . $dateString . '</h1>
                    
                    <p>
                        Cette réunion aura pour sujet :<br/> ' . $appointment->getObject() . '
                    </p>
                    <p>
                        Le client concerné est :<br/> ' . $appointment->getClientId()->getName() . ' ' . $appointment->getClientId()->getFirstName() . '
                    </p>
                    <p>
                        Il est contactable via :<br/> ' . $appointment->getClientId()->getEmail() . ' / ' . $appointment->getClientId()->getPhonenumber() . '
                    </p>
                    <p>
                        Son adresse complète est :<br/> ' . $appointment->getClientId()->getAdress() . ' ' . $appointment->getClientId()->getCP() . ' ' . $appointment->getClientId()->getCity() . '
                    </p>
                    <p>
                       Ce client est indiqué comme :<br/> ' . $appointment->getClientId()->getCommitment() . '
                    </p>
                    ');

            $mailer->send($email);

            //mail for the client
            $email = (new Email())
                ->from('projet.crm.nfactory.NDBBLF@gmail.com')
                ->to($appointment->getClientId()->getEmail())
                ->subject('Une nouvelle réunion dont vous êtes membre à été définie')
                ->text($appointment->getObject() . ' ' . $dateString)
                ->html('<h1>Réunion définie le : ' . $dateString . '</h1>
                    
                    <p>
                        Cette réunion aura pour sujet :<br/>' . $appointment->getObject() . '
                    </p>
                    <p>
                        Votre conseiller est :<br/>' . $user->getName() . ' ' . $user->getFirstName() . '
                    </p>
                    <p>
                        Il est contactable via :<br/>' . $user->getUsername() . ' / ' . $user->getPhoneNumber() . '
                    </p>
                    ');

            $mailer->send($email);

            return $this->redirectToRoute('dashboard');

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
