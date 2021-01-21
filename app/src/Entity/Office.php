<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Office
 *
 * @ORM\Table(name="Office")
 * @ORM\Entity(repositoryClass="App\Repository\OfficeRepository") 
 */
class Office
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdOffice", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoffice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="City", type="string", length=45, nullable=true)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Manager", type="string", length=45, nullable=true)
     */
    private $manager;

    public function getIdoffice(): ?int
    {
        return $this->idoffice;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getManager(): ?string
    {
        return $this->manager;
    }

    public function setManager(?string $manager): self
    {
        $this->manager = $manager;

        return $this;
    }


}
