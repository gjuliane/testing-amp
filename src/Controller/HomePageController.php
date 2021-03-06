<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homePage(): Response
    {
        // return new Response('<html><header></header><body>HomePage</body></html>');
        return $this->render('base.html.twig');
    }
}