<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServicePrefectureRepository")
 */
class ServicePrefecture
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
    private $service_nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Prefecture", mappedBy="service_prefecture_id")
     */
    private $prefectures;

    public function __toString()
    {
        return $this->service_nom;
    }

    public function __construct()
    {
        $this->prefectures = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getServiceNom(): ?string
    {
        return $this->service_nom;
    }

    public function setServiceNom(?string $service_nom): self
    {
        $this->service_nom = $service_nom;

        return $this;
    }

    /**
     * @return Collection|Prefecture[]
     */
    public function getPrefectures(): Collection
    {
        return $this->prefectures;
    }

    public function addPrefecture(Prefecture $prefecture): self
    {
        if (!$this->prefectures->contains($prefecture)) {
            $this->prefectures[] = $prefecture;
            $prefecture->setServicePrefectureId($this);
        }

        return $this;
    }

    public function removePrefecture(Prefecture $prefecture): self
    {
        if ($this->prefectures->contains($prefecture)) {
            $this->prefectures->removeElement($prefecture);
            // set the owning side to null (unless already changed)
            if ($prefecture->getServicePrefectureId() === $this) {
                $prefecture->setServicePrefectureId(null);
            }
        }

        return $this;
    }
}
