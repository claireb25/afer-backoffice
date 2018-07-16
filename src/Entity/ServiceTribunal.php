<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceTribunalRepository")
 */
class ServiceTribunal
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
     * @ORM\OneToMany(targetEntity="App\Entity\Tribunal", mappedBy="service_tribunal_id")
     */
    private $tribunals;
    
    public function __toString()
    {
        return $this->service_nom;
    }

    public function __construct()
    {
        $this->tribunals = new ArrayCollection();
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
            $tribunal->setServiceTribunalId($this);
        }

        return $this;
    }

    public function removeTribunal(Tribunal $tribunal): self
    {
        if ($this->tribunals->contains($tribunal)) {
            $this->tribunals->removeElement($tribunal);
            // set the owning side to null (unless already changed)
            if ($tribunal->getServiceTribunalId() === $this) {
                $tribunal->setServiceTribunalId(null);
            }
        }

        return $this;
    }
}
