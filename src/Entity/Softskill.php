<?php

namespace App\Entity;

use App\Repository\SoftskillRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SoftskillRepository::class)
 */
class Softskill
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
    private $softskill;

    /**
     * @ORM\ManyToOne(targetEntity=InfoAdmin::class, inversedBy="softskills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $admin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoftskill(): ?string
    {
        return $this->softskill;
    }

    public function setSoftskill(string $softskill): self
    {
        $this->softskill = $softskill;

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
