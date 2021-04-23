<?php

namespace App\Controller;

use App\Entity\Quotation;
use App\Form\QuotationFormType;
use App\Repository\QuotationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class AddQuotationController extends AbstractController
{
    /**
     * @Route("/add/quotation", name="add_quotation")
     */
    public function addQuotation(Request $request): Response
    {
        $quotation = new Quotation();
        $form = $this->createForm(QuotationFormType::class, $quotation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($quotation);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }


        return $this->render('add_quotation/index.html.twig', [
            'quotation' => $form->createView(),
        ]);
    }

    /**
     * @Route("/quotation/{id}", name="quotation")
     */
    public function Quotation(int $id, QuotationRepository $quotationRepository) : Response {
        $quotation = $quotationRepository
            ->find($id);

        return  $this->render('add_quotation/quotation.html.twig',  [
            'quotation' => $quotation
        ]);

    }

    /**
     * @Route("/quotation", name="quotationAll")
     */
    public function QuotationAll(QuotationRepository $quotationRepository) : Response {

        $user = $this->getUser();
        if (empty($user)) {
            return $this->redirectToRoute('home');
        }

        $quotation = $quotationRepository
            ->findAll();

        return  $this->render('add_quotation/quotationAll.html.twig',  [
            'quotation' => $quotation
        ]);

    }
}
