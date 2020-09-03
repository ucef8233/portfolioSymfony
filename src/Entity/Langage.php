<?php

namespace App\Entity;

use App\Repository\LangageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LangageRepository::class)
 */
class Langage
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
    private $langage;

    /**
     * @ORM\ManyToOne(targetEntity=InfoAdmin::class, inversedBy="langages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $admin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLangage(): ?string
    {
        return $this->langage;
    }

    public function setLangage(string $langage): self
    {
        $this->langage = $langage;

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
