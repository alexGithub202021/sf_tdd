<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Testentity
 *
 * @ORM\Table(name="testEntity")
 * @ORM\Entity
 */
class Testentity
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdEntity", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Color", type="string", length=0, nullable=false, options={"default"="blue"})
     */
    private $color = 'blue';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    public function getIdentity(): ?int
    {
        return $this->identity;
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

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }


}
