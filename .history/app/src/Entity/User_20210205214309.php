<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository") 
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="Login", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LastName", type="string", length=100, nullable=true)
     */
    private $lastname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="Phone", type="integer", nullable=false)
     */
    private $phone;

    /**
     * @var bool
     *
     * @ORM\Column(name="IsAdmin", type="boolean", nullable=false)
     */
    private $isadmin = '0';

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getIsadmin(): ?bool
    {
        return $this->isadmin;
    }

    public function setIsadmin(bool $isadmin): self
    {
        $this->isadmin = $isadmin;

        return $this;
    }

    public function User(string $login, string $name, string $lastname, string $email, int $phone, Boolean $isadmin) {
        
    }


}
