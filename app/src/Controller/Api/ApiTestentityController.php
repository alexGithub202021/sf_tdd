<?php

namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\TestEntityRepository;
use App\Mapper\TestentityMapper;

    /**
	 * @Route("/api")
	 */
class ApiTestentityController extends AbstractController
{

    private $testentityrepository;

	public function __construct(TestEntityRepository $testentityrepository)
	{
		$this->testentityrepository = $testentityrepository;
	}

    /**
	 * @Route("/Testentity", methods="GET")
	 */
	public function getTestentity(): Response
	{
		// phpinfo();
		$Testentity = $this->testentityrepository->findAll();
		if (!$Testentity) {
			throw new HttpException(404, "Ressource not found");
		}
		$result = TestentityMapper::transform($Testentity);
		return new JsonResponse($result);
	}
}
