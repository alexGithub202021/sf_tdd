<?php

namespace App\Mapper;

use App\Entity\Planets;

class PlanetsMapper
{
	public static function transform(array $planets): array
	{
		$result = array();

		if (count($planets) > 0) {
			foreach ($planets as $planet) {
				$result[] = [
					'IdPlanet' => $planet->getIdplanet(),
					'Name' => $planet->getName(),
					'Color' => $planet->getMaincolor()
				];
			}
		}

		return $result;
	}

	public static function getNewPlanet($data): Planets
	{
		$newPlanet = new Planets();

		$newPlanet
			->setName($data['Name'])
			->setMaincolor($data['Color'])
			->setDiametre($data['Diametre']);

		return $newPlanet;
	}
}
