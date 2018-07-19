<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LiaisonStagiaireStageDossierCasBordereauRepository")
 */
class LiaisonStagiaireStageDossierCasBordereau
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stagiaire", inversedBy="liaisonStagiaireStageDossierCasBordereaus")
     */
    private $stagiaire_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stage", inversedBy="liaisonStagiaireStageDossierCasBordereaus")
     */
    private $stage_id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SuiviDossier", inversedBy="liaisonStagiaireStageDossierCasBordereau", cascade={"persist", "remove"})
     */
    private $suivi_dossier_id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\CasStage", inversedBy="liaisonStagiaireStageDossierCasBordereau", cascade={"persist", "remove"})
     */
    private $cas_stage_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bordereau", inversedBy="liaisonStagiaireStageDossierCasBordereaus")
     */
    private $bordereau_id;

    public function __construct()
    {
        $this->stagiaire_id = new ArrayCollection();
        $this->bordereau_id = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection|Stagiaire[]
     */
    public function getStagiaireId(): Collection
    {
        return $this->stagiaire_id;
    }

    public function addStagiaireId(Stagiaire $stagiaireId): self
    {
        if (!$this->stagiaire_id->contains($stagiaireId)) {
            $this->stagiaire_id[] = $stagiaireId;
            $stagiaireId->setLiaisonStagiaireStageDossierCasBordereau($this);
        }

        return $this;
    }

    public function removeStagiaireId(Stagiaire $stagiaireId): self
    {
        if ($this->stagiaire_id->contains($stagiaireId)) {
            $this->stagiaire_id->removeElement($stagiaireId);
            // set the owning side to null (unless already changed)
            if ($stagiaireId->getLiaisonStagiaireStageDossierCasBordereau() === $this) {
                $stagiaireId->setLiaisonStagiaireStageDossierCasBordereau(null);
            }
        }

        return $this;
    }

    public function getStageId(): ?Stage
    {
        return $this->stage_id;
    }

    public function setStageId(?Stage $stage_id): self
    {
        $this->stage_id = $stage_id;

        return $this;
    }

    public function getSuiviDossierId(): ?SuiviDossier
    {
        return $this->suivi_dossier_id;
    }

    public function setSuiviDossierId(?SuiviDossier $suivi_dossier_id): self
    {
        $this->suivi_dossier_id = $suivi_dossier_id;

        return $this;
    }

    public function getCasStageId(): ?CasStage
    {
        return $this->cas_stage_id;
    }

    public function setCasStageId(?CasStage $cas_stage_id): self
    {
        $this->cas_stage_id = $cas_stage_id;

        return $this;
    }

    /**
     * @return Collection|Bordereau[]
     */
    public function getBordereauId(): Collection
    {
        return $this->bordereau_id;
    }

    public function addBordereauId(Bordereau $bordereauId): self
    {
        if (!$this->bordereau_id->contains($bordereauId)) {
            $this->bordereau_id[] = $bordereauId;
            $bordereauId->setLiaisonStagiaireStageDossierCasBordereau($this);
        }

        return $this;
    }

    public function removeBordereauId(Bordereau $bordereauId): self
    {
        if ($this->bordereau_id->contains($bordereauId)) {
            $this->bordereau_id->removeElement($bordereauId);
            // set the owning side to null (unless already changed)
            if ($bordereauId->getLiaisonStagiaireStageDossierCasBordereau() === $this) {
                $bordereauId->setLiaisonStagiaireStageDossierCasBordereau(null);
            }
        }

        return $this;
    }
}
