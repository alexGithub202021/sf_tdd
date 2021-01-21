<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 * @ORM\Table(name="Users", indexes={@ORM\Index(name="IdUser", columns={"IdUser"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FistName", type="string", length=100, nullable=true)
     */
    private $fistname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LastName", type="string", length=100, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=0, nullable=false, options={"default"="user"})
     */
    private $type = 'user';

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function getFistname(): ?string
    {
        return $this->fistname;
    }

    public function setFistname(?string $fistname): self
    {
        $this->fistname = $fistname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


}
