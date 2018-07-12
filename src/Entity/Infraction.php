<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InfractionRepository")
 */
class Infraction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TypeInfraction", inversedBy="date_infraction")
     */
    private $type_infraction_id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_infraction;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heure_infraction;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $lieu_infraction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero_parquet;

    /**
     * @ORM\Column(type="boolean")
     */
    private $conduite_sans_permis;

    /**
     * @ORM\Column(type="boolean")
     */
    private $conduite_sans_assurance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tribunal")
     */
    private $tribunal_id;


    public function __construct()
    {
        $this->type_infraction_id = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection|TypeInfraction[]
     */
    public function getTypeInfractionId(): Collection
    {
        return $this->type_infraction_id;
    }

    public function addTypeInfractionId(TypeInfraction $typeInfractionId): self
    {
        if (!$this->type_infraction_id->contains($typeInfractionId)) {
            $this->type_infraction_id[] = $typeInfractionId;
        }

        return $this;
    }

    public function removeTypeInfractionId(TypeInfraction $typeInfractionId): self
    {
        if ($this->type_infraction_id->contains($typeInfractionId)) {
            $this->type_infraction_id->removeElement($typeInfractionId);
        }

        return $this;
    }

    public function getDateInfraction(): ?\DateTimeInterface
    {
        return $this->date_infraction;
    }

    public function setDateInfraction(?\DateTimeInterface $date_infraction): self
    {
        $this->date_infraction = $date_infraction;

        return $this;
    }

    public function getHeureInfraction(): ?\DateTimeInterface
    {
        return $this->heure_infraction;
    }

    public function setHeureInfraction(?\DateTimeInterface $heure_infraction): self
    {
        $this->heure_infraction = $heure_infraction;

        return $this;
    }

    public function getLieuInfraction(): ?string
    {
        return $this->lieu_infraction;
    }

    public function setLieuInfraction(?string $lieu_infraction): self
    {
        $this->lieu_infraction = $lieu_infraction;

        return $this;
    }

    public function getNumeroParquet(): ?string
    {
        return $this->numero_parquet;
    }

    public function setNumeroParquet(?string $numero_parquet): self
    {
        $this->numero_parquet = $numero_parquet;

        return $this;
    }

    public function getConduiteSansPermis(): ?bool
    {
        return $this->conduite_sans_permis;
    }

    public function setConduiteSansPermis(?bool $conduite_sans_permis): self
    {
        $this->conduite_sans_permis = $conduite_sans_permis;

        return $this;
    }

    public function getConduiteSansAssurance(): ?bool
    {
        return $this->conduite_sans_assurance;
    }

    public function setConduiteSansAssurance(?bool $conduite_sans_assurance): self
    {
        $this->conduite_sans_assurance = $conduite_sans_assurance;

        return $this;
    }

    public function getTribunalId(): ?Tribunal
    {
        return $this->tribunal_id;
    }

    public function setTribunalId(?Tribunal $tribunal_id): self
    {
        $this->tribunal_id = $tribunal_id;

        return $this;
    }
}
