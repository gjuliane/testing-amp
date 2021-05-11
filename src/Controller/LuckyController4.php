<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;

class LuckyController4 extends AbstractController
{
    public function number(): Response
    {
        $number = random_int(0, 400);
        return $this->render('lucky/number.html.twig', ['number' => $number]);
    }
}