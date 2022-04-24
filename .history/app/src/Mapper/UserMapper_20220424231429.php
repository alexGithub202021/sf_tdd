<?php

namespace App\Mapper;

use App\Entity\User;

class UserMapper
{
	public static function transform(array $users): array
	{
		$result = array();

		var_export($user);
		die;		

		if (count($users) > 0) {
			foreach ($users as $user) {
				var_export($user);
				die;
				
				$result[] = [
					'Login' => $user->getLogin(),
					'Name' => $user->getName(),
					'Lastname' => $user->getLastname(),
					'Email' => $user->getEmail(),
					'Phone' => $user->getPhone()
				];
			}
		}

		return $result;
	}

	public static function getNewPlanet($data): User
	{
		$newPlanet = new User();

		$newPlanet
			->setName($data['Name'])
			->setMaincolor($data['Color'])
			->setDiametre($data['Diametre']);

		return $newPlanet;
	}
}
