<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BordereauRepository")
 */
class Bordereau
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Prefecture", inversedBy="bordereaus")
     */
    private $prefecture_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tribunal", inversedBy="bordereaus")
     */
    private $tribunal_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LiaisonStagiaireStageDossierCasBordereau", inversedBy="bordereau_id")
     */
    private $liaisonStagiaireStageDossierCasBordereau;

    public function getId()
    {
        return $this->id;
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

    public function getTribunalId(): ?Tribunal
    {
        return $this->tribunal_id;
    }

    public function setTribunalId(?Tribunal $tribunal_id): self
    {
        $this->tribunal_id = $tribunal_id;

        return $this;
    }

    public function getLiaisonStagiaireStageDossierCasBordereau(): ?LiaisonStagiaireStageDossierCasBordereau
    {
        return $this->liaisonStagiaireStageDossierCasBordereau;
    }

    public function setLiaisonStagiaireStageDossierCasBordereau(?LiaisonStagiaireStageDossierCasBordereau $liaisonStagiaireStageDossierCasBordereau): self
    {
        $this->liaisonStagiaireStageDossierCasBordereau = $liaisonStagiaireStageDossierCasBordereau;

        return $this;
    }
}
