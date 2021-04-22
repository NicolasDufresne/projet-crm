<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, MailerInterface $mailer): Response
    {
        $actualUser = $this->getUser();
        if (empty($actualUser)) {
            return $this->redirectToRoute('home');
        }
        $role = $actualUser->getRoles();

        if ($role[0] === "ROLE_ADMIN") {
            $user = new User();
            $form = $this->createForm(RegistrationFormType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // encode the plain password
                $user->setPassword(
                    $passwordEncoder->encodePassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                $email = (new Email())
                    ->from('projet.crm.nfactory.NDBBLF@gmail.com')
                    ->to($user->getEmail())
                    ->subject('Hello World !')
                    ->text('Le texte va ici apparement')
                    ->html('<h1>Bienvenue ' . $user->getFirstName() . ' ' . $user->getName() . ' !</h1>
                    
                    <p>
                        Un compte vous à été crée avec votre adresse email sur notre plateforme
                    </p>
                    
                    <p>
                        Si vous ignorez la raison pour laquelle un compte vous à été créer, merci d\'ignorer ce message
                    </p>
                    ');

                $mailer->send($email);

                return $this->redirectToRoute('dashboard');
            }

            return $this->render('registration/register.html.twig', [
                'registrationForm' => $form->createView(),
            ]);
        } else {
            return $this->redirectToRoute('home');
        }
    }
}
