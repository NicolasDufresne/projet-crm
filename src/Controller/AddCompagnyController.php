<?php

namespace App\Controller;

use App\Entity\Compagny;
use App\Form\CompagnyFormType;
use App\Repository\CompagnyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

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
            $date = new \DateTime('NOW');
            $compagny->setCreatedAt($date);
            $entityManager->persist($compagny);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }


        return $this->render('add_compagny/index.html.twig', [
            'compagny' => $form->createView(),
        ]);
    }

    /**
     * @Route("/compagny/{id}", name="compagny")
     */
    public function Compagny(int $id, CompagnyRepository $compagnyRepository) : Response {
        $compagny = $compagnyRepository
            ->find($id);

        return  $this->render('add_compagny/compagny.html.twig',  [
            'compagny' => $compagny
        ]);

    }

    /**
     * @Route("/compagny", name="compagnyAll")
     */
    public function CompagnyAll(CompagnyRepository $compagnyRepository) : Response {
        $compagny = $compagnyRepository
            ->findAll();

        return  $this->render('add_compagny/compagnyAll.html.twig',  [
            'compagny' => $compagny
        ]);

    }
}
