<?php

namespace App\Controller\Api;

use App\Repository\CustomerRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ApiCustomerController
 * @package App\Controller\Api
 * @Route("/api")
 */
class ApiCustomerController extends AbstractController
{
	private $customerRepository;

	public function __construct(CustomerRepository $customerRepository)
	{
		$this->customerRepository = $customerRepository;
	}

	/**
	 * @Route("/countCustomers", methods="GET")
	 */
	public function countCustomers(): Response
	{
		$sql = "select count(*) from Customer where idcustomer = :id";
		$id = 2103;
		$stmt = $this->customerRepository->getManager()->getConnection()->prepare($sql);
		$stmt->bindParam('id', $id);
		$res = $stmt->executeQuery([]);

		return new JsonResponse(intval($res->fetchOne()));
	}

	/**
	 * @Route("/filteredCustomers/{idOffice}", methods="GET")
	 */
	public function filteredCustomers(int $idOffice): Response
	{
		if (!$idOffice) {
			throw new HttpException(400, "Invalid id");
			// return new JsonResponse("Invalid id", 404);
		}
		$sql = "select * from Customer join Office on Customer.idoffice = Office.idoffice where Office.idoffice = :id";
		$id = $idOffice;
		$stmt = $this->customerRepository->getManager()->getConnection()->prepare($sql);
		$stmt->bindParam('id', $id);
		$res = $stmt->executeQuery([]);

		return new JsonResponse($res->fetchAllAssociative());
	}
}
