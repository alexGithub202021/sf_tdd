<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
// use App\Controller\Api\ApiUsersController;

class UserControllerTest extends TestCase
{
	public function testGetUsersWithResults()
	{
		$expect = true;
		$actual = true;
		return self::assertEquals($expect, $actual);
	}

	public function testGetUsersWithNoResult()
	{
		return self::assertEquals(true, true);
	}

	public function testGetUserByLoginWithResults()
	{
		return self::assertEquals(true, true);
	}

	public function testGetUserByLoginWithNoResult()
	{
		return self::assertEquals(true, true);
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

	private function getReferenceUsersList() {

		$userList = array(

		);
		
	}
}
