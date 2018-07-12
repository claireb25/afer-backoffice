<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatutAnimateurRepository")
 */
class StatutAnimateur
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
    private $status_nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Animateur", mappedBy="statut_id")
     */
    private $animateurs;

    public function __construct()
    {
        $this->animateurs = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatusNom(): ?string
    {
        return $this->status_nom;
    }

    public function setStatusNom(?string $status_nom): self
    {
        $this->status_nom = $status_nom;

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
            $animateur->setStatutId($this);
        }

        return $this;
    }

    public function removeAnimateur(Animateur $animateur): self
    {
        if ($this->animateurs->contains($animateur)) {
            $this->animateurs->removeElement($animateur);
            // set the owning side to null (unless already changed)
            if ($animateur->getStatutId() === $this) {
                $animateur->setStatutId(null);
            }
        }

        return $this;
    }
}
