<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutoritePrefectureRepository")
 */
class AutoritePrefecture
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
    private $autorite_nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Prefecture", mappedBy="autorite_prefecture_id")
     */
    private $prefectures;

    public function __toString()
    {
        return $this->autorite_nom;
    }

    public function __construct()
    {
        $this->prefectures = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAutoriteNom(): ?string
    {
        return $this->autorite_nom;
    }

    public function setAutoriteNom(?string $autorite_nom): self
    {
        $this->autorite_nom = $autorite_nom;

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
            $prefecture->setAutoritePrefectureId($this);
        }

        return $this;
    }

    public function removePrefecture(Prefecture $prefecture): self
    {
        if ($this->prefectures->contains($prefecture)) {
            $this->prefectures->removeElement($prefecture);
            // set the owning side to null (unless already changed)
            if ($prefecture->getAutoritePrefectureId() === $this) {
                $prefecture->setAutoritePrefectureId(null);
            }
        }

        return $this;
    }
}
