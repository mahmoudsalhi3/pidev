<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WebinairController extends AbstractController
{
    #[Route('/webinair', name: 'app_webinair')]
    public function index(): Response
    {
        return $this->render('webinair/index.html.twig', [
            'controller_name' => 'WebinairController',
        ]);
    }
}
