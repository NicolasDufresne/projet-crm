<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Form\InvoiceFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddInvoiceController extends AbstractController
{
    /**
     * @Route("/add/invoice", name="add_invoice")
     */
    public function addInvoice(Request $request) : Response {
        $invoice = new Invoice();
        $form = $this->createForm(InvoiceFormType::class, $invoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($invoice);
            $entityManager->flush();

            return $this->redirectToRoute('home');

        }

        return  $this->render('add_invoice/index.html.twig',  [
            'invoice' => $form->createView()
        ]);

    }
}
