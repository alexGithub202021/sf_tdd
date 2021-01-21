<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

		/**
	 * @Route("/users", methods="GET")
	 */
	public function getUsers(UserRepository $repo): Response
	{
		return $this->render('Home/test_twig.html.twig', [
			'users' => $repo->findAll(),
		]);
	}    
}
