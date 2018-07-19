<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StageRepository")
 */
class Stage
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
    private $stage_numero;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LieuStage", inversedBy="stages")
     */
    private $lieu_stage_id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $stage_hpo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LiaisonStagiaireStageDossierCasBordereau", mappedBy="stage_id")
     */
    private $liaisonStagiaireStageDossierCasBordereaus;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AnimateurStage", mappedBy="stage")
     */
    private $animateurStages;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_fin;

    public function __toString() {
        return $this->stage_numero;
    }

    public function __construct()
    {
        $this->liaisonStagiaireStageDossierCasBordereaus = new ArrayCollection();
        $this->animateurs = new ArrayCollection();
        $this->animateurStages = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStageNumero(): ?string
    {
        return $this->stage_numero;
    }

    public function setStageNumero(?string $stage_numero): self
    {
        $this->stage_numero = $stage_numero;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLieuStageId(): ?LieuStage
    {
        return $this->lieu_stage_id;
    }

    public function setLieuStageId(?LieuStage $lieu_stage_id): self
    {
        $this->lieu_stage_id = $lieu_stage_id;

        return $this;
    }

    public function getStageHpo(): ?bool
    {
        return $this->stage_hpo;
    }

    public function setStageHpo(bool $stage_hpo): self
    {
        $this->stage_hpo = $stage_hpo;

        return $this;
    }

    /**
     * @return Collection|LiaisonStagiaireStageDossierCasBordereau[]
     */
    public function getLiaisonStagiaireStageDossierCasBordereaus(): Collection
    {
        return $this->liaisonStagiaireStageDossierCasBordereaus;
    }

    public function addLiaisonStagiaireStageDossierCasBordereau(LiaisonStagiaireStageDossierCasBordereau $liaisonStagiaireStageDossierCasBordereau): self
    {
        if (!$this->liaisonStagiaireStageDossierCasBordereaus->contains($liaisonStagiaireStageDossierCasBordereau)) {
            $this->liaisonStagiaireStageDossierCasBordereaus[] = $liaisonStagiaireStageDossierCasBordereau;
            $liaisonStagiaireStageDossierCasBordereau->setStageId($this);
        }

        return $this;
    }

    public function removeLiaisonStagiaireStageDossierCasBordereau(LiaisonStagiaireStageDossierCasBordereau $liaisonStagiaireStageDossierCasBordereau): self
    {
        if ($this->liaisonStagiaireStageDossierCasBordereaus->contains($liaisonStagiaireStageDossierCasBordereau)) {
            $this->liaisonStagiaireStageDossierCasBordereaus->removeElement($liaisonStagiaireStageDossierCasBordereau);
            // set the owning side to null (unless already changed)
            if ($liaisonStagiaireStageDossierCasBordereau->getStageId() === $this) {
                $liaisonStagiaireStageDossierCasBordereau->setStageId(null);
            }
        }

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
            $animateurStage->setStage($this);
        }

        return $this;
    }

    public function removeAnimateurStage(AnimateurStage $animateurStage): self
    {
        if ($this->animateurStages->contains($animateurStage)) {
            $this->animateurStages->removeElement($animateurStage);
            // set the owning side to null (unless already changed)
            if ($animateurStage->getStage() === $this) {
                $animateurStage->setStage(null);
            }
        }

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(?\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

}
