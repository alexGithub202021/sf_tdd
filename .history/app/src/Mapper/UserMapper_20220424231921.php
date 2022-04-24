<?php

namespace App\Mapper;

use App\Entity\User;

class UserMapper
{
	public static function transform(array $users): array
	{
		$result = array();

		if (count($users) > 0) {
			foreach ($users as $user) {
				
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
}
