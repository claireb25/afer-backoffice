<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutoriteTribunalRepository")
 */
class AutoriteTribunal
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
     * @ORM\OneToMany(targetEntity="App\Entity\Tribunal", mappedBy="autorite_tribunal_id")
     */
    private $tribunals;

    public function __construct()
    {
        $this->tribunals = new ArrayCollection();
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
            $tribunal->setAutoriteTribunalId($this);
        }

        return $this;
    }

    public function removeTribunal(Tribunal $tribunal): self
    {
        if ($this->tribunals->contains($tribunal)) {
            $this->tribunals->removeElement($tribunal);
            // set the owning side to null (unless already changed)
            if ($tribunal->getAutoriteTribunalId() === $this) {
                $tribunal->setAutoriteTribunalId(null);
            }
        }

        return $this;
    }
}
