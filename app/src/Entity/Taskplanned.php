<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taskplanned
 *
 * @ORM\Table(name="TaskPlanned", indexes={@ORM\Index(name="index_task_planned_1", columns={"Login"})})
 * @ORM\Entity
 */
class Taskplanned
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdTaskPlanned", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtaskplanned;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Comment", type="string", length=100, nullable=true)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BeginTime", type="time", nullable=false)
     */
    private $begintime;

    /**
     * @var string
     *
     * @ORM\Column(name="Duration", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $duration;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Login", referencedColumnName="Login")
     * })
     */
    private $login;

    public function getIdtaskplanned(): ?int
    {
        return $this->idtaskplanned;
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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

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

    public function getBegintime(): ?\DateTimeInterface
    {
        return $this->begintime;
    }

    public function setBegintime(\DateTimeInterface $begintime): self
    {
        $this->begintime = $begintime;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

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
