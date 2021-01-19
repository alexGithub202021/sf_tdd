<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CustomerRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Mapper\CustomerMapper;

/**
 * Class CustomerController
 * @package App\Controller
 */
class CustomerController extends AbstractController
{
	private $customerRepository;

	public function __construct(CustomerRepository $customerRepository)
	{
		$this->customerRepository = $customerRepository;
	}

	/**
	 * @Route("/api/customers", methods="GET")
	 */
	public function getCustomers(): Response
	{
		$customers = $this->customerRepository->findAll();
		if (!$customers) {
			throw new HttpException(404, "Ressource not found");
		}
		$result = CustomerMapper::transform($customers);
		return new JsonResponse($result);
	}

	/**
	 * @Route("/api/customers/{id}", methods="GET")
	 */
	public function getCustomerById(int $id): Response
	{
		if (!$id) {
			throw new HttpException(400, "Invalid id");
		}
		$customer = $this->customerRepository->findOneBy(['idCustomer' => $id]);
		if (!$customer) {
			throw new HttpException(404, "Ressource not found");
		}
		$result = CustomerMapper::transform(array($customer));
		return new JsonResponse($result);
	}

	/**
	 * @Route("/api/customer/", methods="POST")
	 */
	public function addCustomer(Request $request): Response
	{
		$data = json_decode($request->getContent(), true);

		if (empty($data['Society']) || empty($data['IdSalesperson']) || empty($data['Credit'])) {
			throw new NotFoundHttpException('Expecting mandatory parameters!');
		} elseif ($data['IdSalesperson'] < 0) {
			throw new HttpException(400, "Invalid parameter : idSalesperson must be positive integer");
		}

		$newCustomer = CustomerMapper::getNewCustomer($data);

		$this->customerRepository->addCustomer($newCustomer);

		// check Add ok
		return $this->getCustomers();
	}

	/**
	 * @Route("/api/customer/{id}", methods="PUT")
	 */
	public function updateCustomer(Request $request, int $id): Response
	{
		if (!$id) {
			throw new HttpException(400, "Invalid id");
		}
		$customer = $this->customerRepository->find($id);
		$data = json_decode($request->getContent(), true);

		if (empty($data['Society']) || empty($data['IdSalesperson']) || empty($data['Credit'])) {
			throw new NotFoundHttpException('Expecting mandatory parameters!');
		} elseif ($data['IdSalesperson'] < 0) {
			throw new HttpException(400, "Invalid parameter : idSalesperson must be positive integer");
		}

		$this->customerRepository->updateCustomer($customer, $data);

		return $this->getCustomerById($id);
	}

	/**
	 * @Route("/api/customer/{id}", methods="DELETE")
	 */
	public function deleteCustomer(int $id): Response
	{
		if (!$id) {
			throw new HttpException(400, "Invalid id");
		}

		$customer = $this->customerRepository->findOneBy(['idCustomer' => $id]);

		if (!$customer) {
			throw new HttpException(400, "Invalid parameter: id not found");
		}

		$this->customerRepository->removeCustomer($customer);

		// check deletion ok
		$customer = $this->customerRepository->findOneBy(['idCustomer' => $id]);
		$result = !$customer ? ['status' => 'customer deleted'] : ['status' => 'deletion failed'];

		return new JsonResponse($result);
	}
}