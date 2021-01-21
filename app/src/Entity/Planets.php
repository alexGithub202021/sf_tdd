<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planets
 *
 * @ORM\Table(name="Planets")
 * @ORM\Entity(repositoryClass="App\Repository\PlanetsRepository") 
 */
class Planets
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdPlanet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPlanet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var float|null
     *
     * @ORM\Column(name="Diametre", type="float", precision=10, scale=2, nullable=true)
     */
    private $diametre;

    /**
     * @var string
     *
     * @ORM\Column(name="MainColor", type="string", length=0, nullable=false, options={"default"="Blue"})
     */
    private $maincolor = 'Blue';

    public function getIdPlanet(): ?int
    {
        return $this->idPlanet;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDiametre(): ?float
    {
        return $this->diametre;
    }

    public function setDiametre(?float $diametre): self
    {
        $this->diametre = $diametre;

        return $this;
    }

    public function getMaincolor(): ?string
    {
        return $this->maincolor;
    }

    public function setMaincolor(string $maincolor): self
    {
        $this->maincolor = $maincolor;

        return $this;
    }


}
