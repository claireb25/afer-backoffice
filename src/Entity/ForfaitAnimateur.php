<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ForfaitAnimateurRepository")
 */
class ForfaitAnimateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $forfait_prix;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Animateur", mappedBy="forfait_animateur_id")
     */
    private $animateurs;

    public function __toString() {
        return (string) $this->forfait_prix;
    }

    public function __construct()
    {
        $this->animateurs = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getForfaitPrix(): ?int
    {
        return $this->forfait_prix;
    }

    public function setForfaitPrix(?int $forfait_prix): self
    {
        $this->forfait_prix = $forfait_prix;

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
            $animateur->setForfaitAnimateurId($this);
        }

        return $this;
    }

    public function removeAnimateur(Animateur $animateur): self
    {
        if ($this->animateurs->contains($animateur)) {
            $this->animateurs->removeElement($animateur);
            // set the owning side to null (unless already changed)
            if ($animateur->getForfaitAnimateurId() === $this) {
                $animateur->setForfaitAnimateurId(null);
            }
        }

        return $this;
    }
}
