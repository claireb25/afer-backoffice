<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NaturePrefectureRepository")
 */
class NaturePrefecture
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
    private $nature_nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Prefecture", mappedBy="prefecture_nature_id")
     */
    private $prefectures;

    public function __construct()
    {
        $this->prefectures = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNatureNom(): ?string
    {
        return $this->nature_nom;
    }

    public function setNatureNom(?string $nature_nom): self
    {
        $this->nature_nom = $nature_nom;

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
            $prefecture->setPrefectureNatureId($this);
        }

        return $this;
    }

    public function removePrefecture(Prefecture $prefecture): self
    {
        if ($this->prefectures->contains($prefecture)) {
            $this->prefectures->removeElement($prefecture);
            // set the owning side to null (unless already changed)
            if ($prefecture->getPrefectureNatureId() === $this) {
                $prefecture->setPrefectureNatureId(null);
            }
        }

        return $this;
    }
}
