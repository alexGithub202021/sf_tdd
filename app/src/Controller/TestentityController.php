<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestentityController extends AbstractController
{
    /**
     * @Route("/testentity", name="testentity")
     */
    public function index(): Response
    {
        return $this->render('testentity/index.html.twig', [
            'controller_name' => 'TestentityController',
        ]);
    }
}
