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
     * @ORM\ManyToMany(targetEntity="App\Entity\Animateur", mappedBy="stage_id")
     */
    private $animateurs;

    public function __construct()
    {
        $this->liaisonStagiaireStageDossierCasBordereaus = new ArrayCollection();
        $this->animateurs = new ArrayCollection();
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
     * @return Collection|Animateur[]
     */
    public function getAnimateurs(): Collection
    {
        return $this->animateurs;
    }

    public function addAnimateur(Animateur $animateur): self
    {
        if (!$this->animateurs->contains($animateur)) {
            $this->animateurs[] = $animateur;
            $animateur->addStageId($this);
        }

        return $this;
    }

    public function removeAnimateur(Animateur $animateur): self
    {
        if ($this->animateurs->contains($animateur)) {
            $this->animateurs->removeElement($animateur);
            $animateur->removeStageId($this);
        }

        return $this;
    }
}
