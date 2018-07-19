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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stage_id;

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

    public function getStageId(): ?int
    {
        return $this->stage_id;
    }

    public function setStageId(?int $stage_id): self
    {
        $this->stage_id = $stage_id;

        return $this;
    }

}
