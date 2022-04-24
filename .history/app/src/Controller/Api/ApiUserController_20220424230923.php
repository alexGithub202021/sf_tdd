<?php

namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UserRepository;
use App\Mapper\UserMapper;

/**
 * @Route("/api")
 */
class ApiUserController extends AbstractController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/users", methods="GET")  
     */
    public function getUsers(): Response
    {
        $result = array();
        $users = $this->userRepository->findAll();

        if (!$users) {
            return new JsonResponse($result, 404);
        }
        $result = UserMapper::transform($users);

        return new JsonResponse($result);
    }

    /**
     * @Route("/users/{login}", methods="GET")
     */
    public function getUserByLogin(string $login): Response
    {
        $result = array();
        if (!is_string($login)){
            throw new HttpException(400, "Invalid login");
        }

        $users = $this->userRepository->findOneBy(['login' => $login]);
        var_export($login);
        die;

        if (is_null($users)) {
            return new JsonResponse($result, 404);
        }

        // var_export($users);
        // die;

        $result = UserMapper::transform(array($users));

        return new JsonResponse($result);
    }

    /**
     * @Route("/testRawQ", methods="GET")  
     */    
    public function testRawQ() {
        $res = $this->userRepository->testRawQ();

        return new JsonResponse($res);
    }

    /**
     * @Route("/testRawQ/{login}", methods="GET")  
     */    
    public function testRawQByLogin(string $login) {
        if (!is_string($login)){
            throw new HttpException(400, "Invalid login");
        }        
        $res = $this->userRepository->testRawQByLogin($login);

        return new JsonResponse($res);
    }    

    /**
     * @Route("/user", name="user")
     */
    // public function index(): Response
    // {
    //     return $this->render('user/index.html.twig', [
    //         'controller_name' => 'UserController',
    //     ]);
    // }
}
