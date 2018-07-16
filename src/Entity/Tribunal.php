<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TribunalRepository")
 */
class Tribunal
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
    private $tribunal_nom;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Bordereau", mappedBy="tribunal_id")
     */
    private $bordereaus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NatureTribunal", inversedBy="tribunals")
     */
    private $nature_tribunal_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AutoriteTribunal", inversedBy="tribunals")
     */
    private $autorite_tribunal_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ServiceTribunal", inversedBy="tribunals")
     */
    private $service_tribunal_id;

    public function __construct()
    {
        $this->bordereaus = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTribunalNom(): ?string
    {
        return $this->tribunal_nom;
    }

    public function setTribunalNom(?string $tribunal_nom): self
    {
        $this->tribunal_nom = $tribunal_nom;

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
            $bordereau->setTribunalId($this);
        }

        return $this;
    }

    public function removeBordereau(Bordereau $bordereau): self
    {
        if ($this->bordereaus->contains($bordereau)) {
            $this->bordereaus->removeElement($bordereau);
            // set the owning side to null (unless already changed)
            if ($bordereau->getTribunalId() === $this) {
                $bordereau->setTribunalId(null);
            }
        }

        return $this;
    }

    public function getNatureTribunalId(): ?NatureTribunal
    {
        return $this->nature_tribunal_id;
    }

    public function setNatureTribunalId(?NatureTribunal $tribunal_nature): self
    {
        $this->nature_tribunal_id = $nature_tribunal_id;

        return $this;
    }

    public function getAutoriteTribunalId(): ?AutoriteTribunal
    {
        return $this->autorite_tribunal_id;
    }

    public function setAutoriteTribunalId(?AutoriteTribunal $autorite_tribunal_id): self
    {
        $this->autorite_tribunal_id = $autorite_tribunal_id;

        return $this;
    }

    public function getServiceTribunalId(): ?ServiceTribunal
    {
        return $this->service_tribunal_id;
    }

    public function setServiceTribunalId(?ServiceTribunal $service_tribunal_id): self
    {
        $this->service_tribunal_id = $service_tribunal_id;

        return $this;
    }
}
