<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="Customer", indexes={@ORM\Index(name="fk_Customer_1_idx1", columns={"IdSalesperson"})})
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 */
class Customer
{
	/**
	 * @var int
	 *
	 * @ORM\Column(name="idCustomer", type="integer", nullable=false)
	 * @ORM\Id()
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $idCustomer;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="Society", type="string", length=45, nullable=true)
	 */
	private $society;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="Credit", type="decimal", precision=9, scale=2, nullable=true)
	 */
	private $credit;

//    /**
//     * @var \Salesperson
//     *
//     * @ORM\ManyToOne(targetEntity="Salesperson")
//     * @ORM\JoinColumns({
//     *   @ORM\JoinColumn(name="IdSalesperson", referencedColumnName="idSalesperson")
//     * })
//     */
	/**
	 * @var \Salesperson
	 *
	 * @ORM\Column(name="idSalesperson", type="integer", nullable=false)
	 */
	private $idsalesperson;

	public function getIdCustomer(): ?int
	{
		return $this->idCustomer;
	}

	public function getSociety(): ?string
	{
		return $this->society;
	}

	public function setSociety(?string $society): self
	{
		$this->society = $society;

		return $this;
	}

	public function getCredit(): ?string
	{
		return $this->credit;
	}

	public function setCredit(?string $credit): self
	{
		$this->credit = $credit;

		return $this;
	}

//	public function getIdsalesperson(): ?Salesperson
//	{
//		return $this->idsalesperson;
//	}

	public function getIdsalesperson(): ?int
	{
		return $this->idsalesperson;
	}

	public function setIdsalesperson(int $idsalesperson): self
	{
		$this->idsalesperson = $idsalesperson;

		return $this;
	}
}
