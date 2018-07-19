<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimateurStageRepository")
 */
class AnimateurStage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Animateur", inversedBy="animateurStages")
     */
    private $animateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stage", inversedBy="animateurStages")
     */
    private $stage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Defraiement", inversedBy="animateurStages")
     */
    private $defraiement;

    public function getId()
    {
        return $this->id;
    }

    public function getAnimateur(): ?Animateur
    {
        return $this->animateur;
    }

    public function setAnimateur(?Animateur $animateur): self
    {
        $this->animateur = $animateur;

        return $this;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function setStage(?Stage $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getDefraiement(): ?Defraiement
    {
        return $this->defraiement;
    }

    public function setDefraiement(?Defraiement $defraiement): self
    {
        $this->defraiement = $defraiement;

        return $this;
    }
}
