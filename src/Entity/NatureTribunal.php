<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NatureTribunalRepository")
 */
class NatureTribunal
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
     * @ORM\OneToMany(targetEntity="App\Entity\Tribunal", mappedBy="tribunal_nature")
     */
    private $tribunals;

    public function __toString()
    {
        return $this->nature_nom;
    }

    public function __construct()
    {
        $this->tribunals = new ArrayCollection();
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
     * @return Collection|Tribunal[]
     */
    public function getTribunals(): Collection
    {
        return $this->tribunals;
    }

    public function addTribunal(Tribunal $tribunal): self
    {
        if (!$this->tribunals->contains($tribunal)) {
            $this->tribunals[] = $tribunal;
            $tribunal->setTribunalNature($this);
        }

        return $this;
    }

    public function removeTribunal(Tribunal $tribunal): self
    {
        if ($this->tribunals->contains($tribunal)) {
            $this->tribunals->removeElement($tribunal);
            // set the owning side to null (unless already changed)
            if ($tribunal->getTribunalNature() === $this) {
                $tribunal->setTribunalNature(null);
            }
        }

        return $this;
    }
}
