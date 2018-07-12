<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModeEnvoiConvocRepository")
 */
class ModeEnvoiConvoc
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
    private $courrier;

    /**
     * @ORM\Column(type="boolean")
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SuiviDossier", mappedBy="convoc_envoye_par_id")
     */
    private $suiviDossiers;

    public function __construct()
    {
        $this->suiviDossiers = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCourrier(): ?bool
    {
        return $this->courrier;
    }

    public function setCourrier(?bool $courrier): self
    {
        $this->courrier = $courrier;

        return $this;
    }

    public function getEmail(): ?bool
    {
        return $this->email;
    }

    public function setEmail(?bool $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|SuiviDossier[]
     */
    public function getSuiviDossiers(): Collection
    {
        return $this->suiviDossiers;
    }

    public function addSuiviDossier(SuiviDossier $suiviDossier): self
    {
        if (!$this->suiviDossiers->contains($suiviDossier)) {
            $this->suiviDossiers[] = $suiviDossier;
            $suiviDossier->addConvocEnvoyeParId($this);
        }

        return $this;
    }

    public function removeSuiviDossier(SuiviDossier $suiviDossier): self
    {
        if ($this->suiviDossiers->contains($suiviDossier)) {
            $this->suiviDossiers->removeElement($suiviDossier);
            $suiviDossier->removeConvocEnvoyeParId($this);
        }

        return $this;
    }
}
