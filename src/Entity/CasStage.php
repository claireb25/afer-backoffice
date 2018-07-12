<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CasStageRepository")
 */
class CasStage
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
    private $cas_nom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cas_prix;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\LiaisonStagiaireStageDossierCasBordereau", mappedBy="cas_stage_id", cascade={"persist", "remove"})
     */
    private $liaisonStagiaireStageDossierCasBordereau;

    public function getId()
    {
        return $this->id;
    }

    public function getCasNom(): ?string
    {
        return $this->cas_nom;
    }

    public function setCasNom(?string $cas_nom): self
    {
        $this->cas_nom = $cas_nom;

        return $this;
    }

    public function getCasPrix(): ?int
    {
        return $this->cas_prix;
    }

    public function setCasPrix(?int $cas_prix): self
    {
        $this->cas_prix = $cas_prix;

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
        $newCas_stage_id = $liaisonStagiaireStageDossierCasBordereau === null ? null : $this;
        if ($newCas_stage_id !== $liaisonStagiaireStageDossierCasBordereau->getCasStageId()) {
            $liaisonStagiaireStageDossierCasBordereau->setCasStageId($newCas_stage_id);
        }

        return $this;
    }
}
