<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SecurityController extends AbstractController
{

    public function addUser(Request $request): Response {
        $user = new User();
        $datas = json_decode($request->getContent(),true);
        $response = new Response();
        $entityManager = $this->getDoctrine()->getManager();
        $error = [];

        if ($datas['email']){
            $user->setEmail($datas['email']);
        }
        if ($datas['password']){
            $user->setPassword($datas['password']);
        }
        if ($datas['first_name']){
            $user->setFirstName($datas['first_name']);
        }
        if ($datas['name']){
            $user->setName($datas['name']);
        }
        if ($datas['phonenumber']){
            $user->setPhonenumber($datas['phonenumber']);
        }
        if ($datas['adress']){
            $user->setAdress($datas['adress']);
        }
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
             $userid = $this->getUser()->getId();
             var_dump($userid);
             return $this->redirectToRoute('home');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the users
        $lastUsername = $authenticationUtils->getLastUsername();


        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
