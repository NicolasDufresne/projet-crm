<?php

namespace App\Controller;

use App\Entity\User;
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
    /**
     * @Route("/security", name="security")
     */
    public function index(): Response
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    public function addUser(Request $request): Response {
        $user = new User();
        $datas = json_decode($request->getContent(),true);
        $response = new Response();
        $entityManager = $this->getDoctrine()->getManager();
        $error = [];

        if ($datas['first_name']){
            $user->setName($datas['first_name']);
        }



    }
}
