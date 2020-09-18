<?php

namespace App\Entity;

use App\Repository\InfoAdminRepository;
use Doctrine\Common\Collections\{Collection, ArrayCollection};
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InfoAdminRepository::class)
 */
class InfoAdmin
{
    // /**
    //  * @ORM\Column(type="json")
    //  */
    // private $roles = [];

    //
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="text")
     */
    private $adress;
    /**
     * @ORM\OneToMany(targetEntity=Etude::class, mappedBy="admin")
     */
    private $etudes;

    /**
     * @ORM\OneToMany(targetEntity=Softskill::class, mappedBy="admin")
     */
    private $softskills;

    /**
     * @ORM\OneToMany(targetEntity=Langage::class, mappedBy="admin")
     */
    private $langages;

    /**
     * @ORM\OneToMany(targetEntity=Experiance::class, mappedBy="admin")
     */
    private $experiances;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    // public function getRoles(): array
    // {
    //     $roles = $this->roles;
    //     // guarantee every user at least has ROLE_USER
    //     $roles[] = 'ROLE_USER';

    //     return array_unique($roles);
    // }
    public function __construct()
    {
        $this->etudes = new ArrayCollection();
        $this->softskills = new ArrayCollection();
        $this->langages = new ArrayCollection();
        $this->experiances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * @return Collection|Etude[]
     */
    public function getEtudes(): Collection
    {
        return $this->etudes;
    }

    public function addEtude(Etude $etude): self
    {
        if (!$this->etudes->contains($etude)) {
            $this->etudes[] = $etude;
            $etude->setAdmin($this);
        }

        return $this;
    }

    public function removeEtude(Etude $etude): self
    {
        if ($this->etudes->contains($etude)) {
            $this->etudes->removeElement($etude);
            // set the owning side to null (unless already changed)
            if ($etude->getAdmin() === $this) {
                $etude->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Softskill[]
     */
    public function getSoftskills(): Collection
    {
        return $this->softskills;
    }

    public function addSoftskill(Softskill $softskill): self
    {
        if (!$this->softskills->contains($softskill)) {
            $this->softskills[] = $softskill;
            $softskill->setAdmin($this);
        }

        return $this;
    }

    public function removeSoftskill(Softskill $softskill): self
    {
        if ($this->softskills->contains($softskill)) {
            $this->softskills->removeElement($softskill);
            // set the owning side to null (unless already changed)
            if ($softskill->getAdmin() === $this) {
                $softskill->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Langage[]
     */
    public function getLangages(): Collection
    {
        return $this->langages;
    }

    public function addLangage(Langage $langage): self
    {
        if (!$this->langages->contains($langage)) {
            $this->langages[] = $langage;
            $langage->setAdmin($this);
        }

        return $this;
    }

    public function removeLangage(Langage $langage): self
    {
        if ($this->langages->contains($langage)) {
            $this->langages->removeElement($langage);
            // set the owning side to null (unless already changed)
            if ($langage->getAdmin() === $this) {
                $langage->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Experiance[]
     */
    public function getExperiances(): Collection
    {
        return $this->experiances;
    }

    public function addExperiance(Experiance $experiance): self
    {
        if (!$this->experiances->contains($experiance)) {
            $this->experiances[] = $experiance;
            $experiance->setAdmin($this);
        }

        return $this;
    }

    public function removeExperiance(Experiance $experiance): self
    {
        if ($this->experiances->contains($experiance)) {
            $this->experiances->removeElement($experiance);
            // set the owning side to null (unless already changed)
            if ($experiance->getAdmin() === $this) {
                $experiance->setAdmin(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
