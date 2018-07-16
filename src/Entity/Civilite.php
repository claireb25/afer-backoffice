<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CiviliteRepository")
 */
class Civilite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stagiaire", mappedBy="civilite_id")
     */
    private $stagiaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Animateur", mappedBy="civilite_id")
     */
    private $animateurs;

    public function __toString() {
        return $this->nom;
    }

    public function __construct()
    {
        $this->stagiaires = new ArrayCollection();
        $this->animateurs = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Stagiaire[]
     */
    public function getStagiaires(): Collection
    {
        return $this->stagiaires;
    }

    public function addStagiaire(Stagiaire $stagiaire): self
    {
        if (!$this->stagiaires->contains($stagiaire)) {
            $this->stagiaires[] = $stagiaire;
            $stagiaire->setCiviliteId($this);
        }

        return $this;
    }

    public function removeStagiaire(Stagiaire $stagiaire): self
    {
        if ($this->stagiaires->contains($stagiaire)) {
            $this->stagiaires->removeElement($stagiaire);
            // set the owning side to null (unless already changed)
            if ($stagiaire->getCiviliteId() === $this) {
                $stagiaire->setCiviliteId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Animateur[]
     */
    public function getAnimateurs(): Collection
    {
        return $this->animateurs;
    }

    public function addAnimateur(Animateur $animateur): self
    {
        if (!$this->animateurs->contains($animateur)) {
            $this->animateurs[] = $animateur;
            $animateur->setCiviliteId($this);
        }

        return $this;
    }

    public function removeAnimateur(Animateur $animateur): self
    {
        if ($this->animateurs->contains($animateur)) {
            $this->animateurs->removeElement($animateur);
            // set the owning side to null (unless already changed)
            if ($animateur->getCiviliteId() === $this) {
                $animateur->setCiviliteId(null);
            }
        }

        return $this;
    }
}
