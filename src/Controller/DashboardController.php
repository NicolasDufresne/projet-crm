<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        if (empty($user)) {
            return $this->redirectToRoute('home');
        }
        return $this->render('dashboard/index.html.twig');
    }
}
