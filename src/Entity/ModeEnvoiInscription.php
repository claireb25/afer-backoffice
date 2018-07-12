<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModeEnvoiInscriptionRepository")
 */
class ModeEnvoiInscription
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
     * @ORM\ManyToMany(targetEntity="App\Entity\SuiviDossier", mappedBy="inscription_envoye_par_id")
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
            $suiviDossier->addInscriptionEnvoyeParId($this);
        }

        return $this;
    }

    public function removeSuiviDossier(SuiviDossier $suiviDossier): self
    {
        if ($this->suiviDossiers->contains($suiviDossier)) {
            $this->suiviDossiers->removeElement($suiviDossier);
            $suiviDossier->removeInscriptionEnvoyeParId($this);
        }

        return $this;
    }
}
