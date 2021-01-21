<?php

namespace App\Mapper;

use App\Entity\Testentity;

class TestentityMapper
{
	public static function transform(array $testentities): array
	{
		$result = array();

		if (count($testentities) > 0) {
			foreach ($testentities as $testentity) {
				$result[] = [
					'IdEntity' => $testentity->getIdentity(),
					'Name' => $testentity->getName(),
					'Color' => $testentity->getColor()
				];
			}
		}

		return $result;
	}

	// public static function getNewTestentity($data): Testentity
	// {
	// 	$newTestentity = new Testentity();

	// 	$newTestentity
	// 		->setSociety($data['Society'])
	// 		->setIdsalesperson($data['IdSalesperson'])
	// 		->setCredit($data['Credit']);

	// 	return $newTestentity;
	// }
}