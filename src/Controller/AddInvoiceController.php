<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Form\InvoiceFormType;
use App\Repository\InvoiceRepository;
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
            $userid = $this->getUser();
            $invoice ->setUserId($userid);
            $entityManager->persist($invoice);
            $entityManager->flush();

            return $this->redirectToRoute('home');

        }

        return  $this->render('add_invoice/index.html.twig',  [
            'invoice' => $form->createView()
        ]);

    }

    /**
     * @Route("/invoice/{id}", name="invoice")
     */
    public function Invoice(int $id, InvoiceRepository $invoiceRepository) : Response {
        $invoice = $invoiceRepository
            ->find($id);

        return  $this->render('add_invoice/invoice.html.twig',  [
            'invoice' => $invoice
        ]);

    }

    /**
     * @Route("/invoice", name="invoiceAll")
     */
    public function InvoiceAll(InvoiceRepository $invoiceRepository) : Response {

        $user = $this->getUser();
        if (empty($user)) {
            return $this->redirectToRoute('home');
        }
        $role = $user->getRoles();

        if ($role[0] === "ROLE_ADMIN") {
            $invoice = $invoiceRepository
                ->findAll();
        } else if ($role[0] === "ROLE_USER") {
            $invoice = $invoiceRepository
                ->findBy(['user_id' => $user]);
        }
        return  $this->render('add_invoice/invoiceAll.html.twig',  [
            'invoice' => $invoice
        ]);

    }
}
