<?php

namespace App\Entity;

use App\Repository\ExperianceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperianceRepository::class)
 */
class Experiance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $experiance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=InfoAdmin::class, inversedBy="experiances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $admin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExperiance(): ?string
    {
        return $this->experiance;
    }

    public function setExperiance(string $experiance): self
    {
        $this->experiance = $experiance;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAdmin(): ?InfoAdmin
    {
        return $this->admin;
    }

    public function setAdmin(?InfoAdmin $admin): self
    {
        $this->admin = $admin;

        return $this;
    }
}
