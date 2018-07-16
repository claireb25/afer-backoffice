<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FonctionAnimateurRepository")
 */
class FonctionAnimateur
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
    private $fonction_nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Animateur", mappedBy="fonction_animateur_id")
     */
    private $animateurs;

    public function __toString() {
        return $this->fonction_nom;
    }

    public function __construct()
    {
        $this->animateurs = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFonctionNom(): ?string
    {
        return $this->fonction_nom;
    }

    public function setFonctionNom(?string $fonction_nom): self
    {
        $this->fonction_nom = $fonction_nom;

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
            $animateur->setFonctionAnimateurId($this);
        }

        return $this;
    }

    public function removeAnimateur(Animateur $animateur): self
    {
        if ($this->animateurs->contains($animateur)) {
            $this->animateurs->removeElement($animateur);
            // set the owning side to null (unless already changed)
            if ($animateur->getFonctionAnimateurId() === $this) {
                $animateur->setFonctionAnimateurId(null);
            }
        }

        return $this;
    }
}
