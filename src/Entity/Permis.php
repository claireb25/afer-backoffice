<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PermisRepository")
 */
class Permis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Stagiaire", inversedBy="permis", cascade={"persist", "remove"})
     */
    private $stagiaire_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Prefecture", inversedBy="permis")
     */
    private $prefecture_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero_permis;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $delivre_le;

    public function __toString() { 
        return $this->numero_permis; }

    public function getId()
    {
        return $this->id;
    }

    public function getStagiaireId(): ?Stagiaire
    {
        return $this->stagiaire_id;
    }

    public function setStagiaireId(?Stagiaire $stagiaire_id): self
    {
        $this->stagiaire_id = $stagiaire_id;

        return $this;
    }

    public function getPrefectureId(): ?Prefecture
    {
        return $this->prefecture_id;
    }

    public function setPrefectureId(?Prefecture $prefecture_id): self
    {
        $this->prefecture_id = $prefecture_id;

        return $this;
    }

    public function getNumeroPermis(): ?string
    {
        return $this->numero_permis;
    }

    public function setNumeroPermis(?string $numero_permis): self
    {
        $this->numero_permis = $numero_permis;

        return $this;
    }

    public function getDelivreLe(): ?\DateTimeInterface
    {
        return $this->delivre_le;
    }

    public function setDelivreLe(?\DateTimeInterface $delivre_le): self
    {
        $this->delivre_le = $delivre_le;

        return $this;
    }
}
