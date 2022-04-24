<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table(name="Activity", indexes={@ORM\Index(name="actv_login_fk", columns={"Login"})})
 * @ORM\Entity
 * 
 * @ApiResource(
 * collectionOperations={"get"={"normalization_context"={"groups"="activity:list"}}}
 * )
 */
class Activity
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdActivity", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     * @Groups({"activity:list"})
     */
    private $idactivity;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100, nullable=false)
     * 
     * @Groups({"activity:list"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Color", type="string", length=100, nullable=false)
     * 
     * @Groups({"activity:list"})
     */
    private $color;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Login", referencedColumnName="Login")
     * })
     * 
     * @Groups({"activity:list"})
     */
    private $login;

    public function getIdactivity(): ?int
    {
        return $this->idactivity;
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

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getLogin(): ?User
    {
        return $this->login;
    }

    public function setLogin(?User $login): self
    {
        $this->login = $login;

        return $this;
    }
}
