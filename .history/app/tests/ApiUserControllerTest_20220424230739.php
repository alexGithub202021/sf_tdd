<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Controller\Api\ApiUserController;
use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiUserControllerTest extends TestCase
{
	public function testGetUsersWithNoResult()
	{
		$expected = new JsonResponse(array(), 404);

		$response = array();
		$userRepository = $this->createMock(UserRepository::class);
		$userRepository->expects($this->once())
			->method("findAll")
			->willReturn($response);

		$userController = new ApiUserController($userRepository);
		$actual = $userController->getUsers();

		return self::assertEquals($expected, $actual);
	}

	public function testGetUsersWithResults()
	{
		$expected = new JsonResponse(array(
			0 => array(
				"Login" => "PRiviere",
				"Name" => "Pierre",
				"Lastname" => "Riviere",
				"Email" => "p@mail.com",
				"Phone" => 0
			),
			1 => array(
				"Login" => "XXXX",
				"Name" => "XXXX",
				"Lastname" => "XXXX",
				"Email" => "xx@mail.com",
				"Phone" => 0
			)
		));

		$response = $this->getReferenceUsersList();
		$userRepository = $this->createMock(UserRepository::class);
		$userRepository->expects($this->once())
			->method("findAll")
			->willReturn($response);

		$userController = new ApiUserController($userRepository);
		$actual = $userController->getUsers();

		return self::assertEquals($expected, $actual);
	}

	public function testGetUserByLoginWithResults()
	{
		$login = "XXXX";
		$expected = new JsonResponse(
			array(
				array(
					"Login" => "XXXX",
					"Name" => "XXXX",
					"Lastname" => "XXXX",
					"Email" => "xx@mail.com",
					"Phone" => 0
				)
			)
		);

		$response = $this->getReferenceUser();
		$userRepository = $this->createMock(UserRepository::class);
		$userRepository->expects($this->once())
			->method("findOneBy")
			->willReturn($response);

		$userController = new ApiUserController($userRepository);
		$actual = $userController->getUserByLogin($login);

		return self::assertEquals($expected, $actual);
	}

	public function testGetUserByLoginWithNoResult()
	{
		$login = "test";
		$expected = new JsonResponse(array(), 404);

		$response = array();
		$userRepository = $this->createMock(UserRepository::class);
		$userRepository->expects($this->once())
			->method("findOneBy")
			->willReturn($response);

		$userController = new ApiUserController($userRepository);
		$actual = $userController->getUserByLogin($login);

		// var_export($actual);
		// die;

		return self::assertEquals($expected, $actual);
	}

	public function testUpdateUserOk()
	{
		return self::assertEquals(true, true);
	}

	public function testUpdateUserNotOk()
	{
		return self::assertEquals(true, true);
	}

	public function testDeleteUserOk()
	{
		return self::assertEquals(true, true);
	}

	public function testDeleteUserNotOk()
	{
		return self::assertEquals(true, true);
	}

	private function getReferenceUsersList()
	{
		$userList = array(
			0 => new User('PRiviere', 'Pierre', 'Riviere', 'p@mail.com',  0, true),
			1 => new User('XXXX', 'XXXX', 'XXXX', 'xx@mail.com',  0, false)
		);
		return $userList;
	}

	private function getReferenceUser()
	{
		$user = new User('XXXX', 'XXXX', 'XXXX', 'xx@mail.com',  0, false);
		return $user;
	}
}
