<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DefraiementRepository")
 */
class Defraiement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $repas;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $km_ar;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AnimateurStage", mappedBy="defraiement")
     */
    private $animateurStages;

    public function __construct()
    {
        $this->animateurStages = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRepas(): ?bool
    {
        return $this->repas;
    }

    public function setRepas(bool $repas): self
    {
        $this->repas = $repas;

        return $this;
    }

    public function getKmAr(): ?int
    {
        return $this->km_ar;
    }

    public function setKmAr(?int $km_ar): self
    {
        $this->km_ar = $km_ar;

        return $this;
    }

    /**
     * @return Collection|AnimateurStage[]
     */
    public function getAnimateurStages(): Collection
    {
        return $this->animateurStages;
    }

    public function addAnimateurStage(AnimateurStage $animateurStage): self
    {
        if (!$this->animateurStages->contains($animateurStage)) {
            $this->animateurStages[] = $animateurStage;
            $animateurStage->setDefraiement($this);
        }

        return $this;
    }

    public function removeAnimateurStage(AnimateurStage $animateurStage): self
    {
        if ($this->animateurStages->contains($animateurStage)) {
            $this->animateurStages->removeElement($animateurStage);
            // set the owning side to null (unless already changed)
            if ($animateurStage->getDefraiement() === $this) {
                $animateurStage->setDefraiement(null);
            }
        }

        return $this;
    }

}
