<?php

namespace App\Controller;

use App\Entity\Compagny;
use App\Form\CompagnyFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddCompagnyController extends AbstractController
{
    /**
     * @Route("/add/compagny", name="add_compagny")
     */
    public function addCompagny(Request $request): Response
    {
        $compagny = new Compagny();
        $form = $this->createForm(CompagnyFormType::class, $compagny);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($compagny);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }


        return $this->render('add_compagny/index.html.twig', [
            'compagny' => $form->createView(),
        ]);
    }
}
