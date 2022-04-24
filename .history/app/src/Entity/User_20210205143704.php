<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity
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


}
