<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrefectureRepository")
 */
class Prefecture
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
    private $prefecture_nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commune;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bordereau", mappedBy="prefecture_id")
     */
    private $bordereaus;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Permis", mappedBy="prefecture_id")
     */
    private $permis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prefecture_service;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NaturePrefecture", inversedBy="prefectures")
     */
    private $prefecture_nature_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AutoritePrefecture", inversedBy="prefectures")
     */
    private $autorite_prefecture_id;

    public function __construct()
    {
        $this->bordereaus = new ArrayCollection();
        $this->permis = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrefectureNom(): ?string
    {
        return $this->prefecture_nom;
    }

    public function setPrefectureNom(?string $prefecture_nom): self
    {
        $this->prefecture_nom = $prefecture_nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(?string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(?string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * @return Collection|Bordereau[]
     */
    public function getBordereaus(): Collection
    {
        return $this->bordereaus;
    }

    public function addBordereau(Bordereau $bordereau): self
    {
        if (!$this->bordereaus->contains($bordereau)) {
            $this->bordereaus[] = $bordereau;
            $bordereau->setPrefectureId($this);
        }

        return $this;
    }

    public function removeBordereau(Bordereau $bordereau): self
    {
        if ($this->bordereaus->contains($bordereau)) {
            $this->bordereaus->removeElement($bordereau);
            // set the owning side to null (unless already changed)
            if ($bordereau->getPrefectureId() === $this) {
                $bordereau->setPrefectureId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Permis[]
     */
    public function getPermis(): Collection
    {
        return $this->permis;
    }

    public function addPermi(Permis $permi): self
    {
        if (!$this->permis->contains($permi)) {
            $this->permis[] = $permi;
            $permi->setPrefectureId($this);
        }

        return $this;
    }

    public function removePermi(Permis $permi): self
    {
        if ($this->permis->contains($permi)) {
            $this->permis->removeElement($permi);
            // set the owning side to null (unless already changed)
            if ($permi->getPrefectureId() === $this) {
                $permi->setPrefectureId(null);
            }
        }

        return $this;
    }

    public function getPrefectureService(): ?string
    {
        return $this->prefecture_service;
    }

    public function setPrefectureService(?string $prefecture_service): self
    {
        $this->prefecture_service = $prefecture_service;

        return $this;
    }

    public function getPrefectureNatureId(): ?NaturePrefecture
    {
        return $this->prefecture_nature_id;
    }

    public function setPrefectureNatureId(?NaturePrefecture $prefecture_nature_id): self
    {
        $this->prefecture_nature_id = $prefecture_nature_id;

        return $this;
    }

    public function getAutoritePrefectureId(): ?AutoritePrefecture
    {
        return $this->autorite_prefecture_id;
    }

    public function setAutoritePrefectureId(?AutoritePrefecture $autorite_prefecture_id): self
    {
        $this->autorite_prefecture_id = $autorite_prefecture_id;

        return $this;
    }
}
