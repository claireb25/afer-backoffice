<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SuiviDossierRepository")
 */
class SuiviDossier
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
    private $paye;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ModeEnvoiInscription", inversedBy="suiviDossiers")
     */
    private $inscription_envoye_par_id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ModeEnvoiConvoc", inversedBy="suiviDossiers")
     */
    private $convoc_envoye_par_id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $reception_bulletin_inscription;

    /**
     * @ORM\Column(type="boolean")
     */
    private $copie_cni;

    /**
     * @ORM\Column(type="boolean")
     */
    private $copie_permis;

    /**
     * @ORM\Column(type="boolean")
     */
    private $releve_integral;

    /**
     * @ORM\Column(type="boolean")
     */
    private $decision_judiciaire;

    /**
     * @ORM\Column(type="boolean")
     */
    private $lettre_48n;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $observations;

        /**
     * @ORM\OneToOne(targetEntity="App\Entity\LiaisonStagiaireStageDossierCasBordereau", mappedBy="suivi_dossier_id", cascade={"persist", "remove"})
     */
    private $liaisonStagiaireStageDossierCasBordereau;

    public function __construct()
    {
        $this->inscription_envoye_par_id = new ArrayCollection();
        $this->convoc_envoye_par_id = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPaye(): ?bool
    {
        return $this->paye;
    }

    public function setPaye(?bool $paye): self
    {
        $this->paye = $paye;

        return $this;
    }

    /**
     * @return Collection|ModeEnvoiInscription[]
     */
    public function getInscriptionEnvoyeParId(): Collection
    {
        return $this->inscription_envoye_par_id;
    }

    public function addInscriptionEnvoyeParId(ModeEnvoiInscription $inscriptionEnvoyeParId): self
    {
        if (!$this->inscription_envoye_par_id->contains($inscriptionEnvoyeParId)) {
            $this->inscription_envoye_par_id[] = $inscriptionEnvoyeParId;
        }

        return $this;
    }

    public function removeInscriptionEnvoyeParId(ModeEnvoiInscription $inscriptionEnvoyeParId): self
    {
        if ($this->inscription_envoye_par_id->contains($inscriptionEnvoyeParId)) {
            $this->inscription_envoye_par_id->removeElement($inscriptionEnvoyeParId);
        }

        return $this;
    }

    /**
     * @return Collection|ModeEnvoiConvoc[]
     */
    public function getConvocEnvoyeParId(): Collection
    {
        return $this->convoc_envoye_par_id;
    }

    public function addConvocEnvoyeParId(ModeEnvoiConvoc $convocEnvoyeParId): self
    {
        if (!$this->convoc_envoye_par_id->contains($convocEnvoyeParId)) {
            $this->convoc_envoye_par_id[] = $convocEnvoyeParId;
        }

        return $this;
    }

    public function removeConvocEnvoyeParId(ModeEnvoiConvoc $convocEnvoyeParId): self
    {
        if ($this->convoc_envoye_par_id->contains($convocEnvoyeParId)) {
            $this->convoc_envoye_par_id->removeElement($convocEnvoyeParId);
        }

        return $this;
    }

    public function getReceptionBulletinInscription(): ?bool
    {
        return $this->reception_bulletin_inscription;
    }

    public function setReceptionBulletinInscription(?bool $reception_bulletin_inscription): self
    {
        $this->reception_bulletin_inscription = $reception_bulletin_inscription;

        return $this;
    }

    public function getCopieCni(): ?bool
    {
        return $this->copie_cni;
    }

    public function setCopieCni(?bool $copie_cni): self
    {
        $this->copie_cni = $copie_cni;

        return $this;
    }

    public function getCopiePermis(): ?bool
    {
        return $this->copie_permis;
    }

    public function setCopiePermis(?bool $copie_permis): self
    {
        $this->copie_permis = $copie_permis;

        return $this;
    }

    public function getReleveIntegral(): ?bool
    {
        return $this->releve_integral;
    }

    public function setReleveIntegral(?bool $releve_integral): self
    {
        $this->releve_integral = $releve_integral;

        return $this;
    }

    public function getDecisionJudiciaire(): ?bool
    {
        return $this->decision_judiciaire;
    }

    public function setDecisionJudiciaire(?bool $decision_judiciaire): self
    {
        $this->decision_judiciaire = $decision_judiciaire;

        return $this;
    }

    public function getLettre48n(): ?bool
    {
        return $this->lettre_48n;
    }

    public function setLettre48n(bool $lettre_48n): self
    {
        $this->lettre_48n = $lettre_48n;

        return $this;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(?string $observations): self
    {
        $this->observations = $observations;

        return $this;
    }

    public function getLiaisonStagiaireStageDossierCasBordereau(): ?LiaisonStagiaireStageDossierCasBordereau
    {
        return $this->liaisonStagiaireStageDossierCasBordereau;
    }

    public function setLiaisonStagiaireStageDossierCasBordereau(?LiaisonStagiaireStageDossierCasBordereau $liaisonStagiaireStageDossierCasBordereau): self
    {
        $this->liaisonStagiaireStageDossierCasBordereau = $liaisonStagiaireStageDossierCasBordereau;

        // set (or unset) the owning side of the relation if necessary
        $newSuivi_dossier_id = $liaisonStagiaireStageDossierCasBordereau === null ? null : $this;
        if ($newSuivi_dossier_id !== $liaisonStagiaireStageDossierCasBordereau->getSuiviDossierId()) {
            $liaisonStagiaireStageDossierCasBordereau->setSuiviDossierId($newSuivi_dossier_id);
        }

        return $this;
    }
}
