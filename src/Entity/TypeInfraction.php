<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeInfractionRepository")
 */
class TypeInfraction
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
    private $type_infraction;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Infraction", mappedBy="type_infraction_id")
     */
    private $date_infraction;

    public function __construct()
    {
        $this->date_infraction = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTypeInfraction(): ?string
    {
        return $this->type_infraction;
    }

    public function setTypeInfraction(?string $type_infraction): self
    {
        $this->type_infraction = $type_infraction;

        return $this;
    }

    /**
     * @return Collection|Infraction[]
     */
    public function getDateInfraction(): Collection
    {
        return $this->date_infraction;
    }

    public function addDateInfraction(Infraction $dateInfraction): self
    {
        if (!$this->date_infraction->contains($dateInfraction)) {
            $this->date_infraction[] = $dateInfraction;
            $dateInfraction->addTypeInfractionId($this);
        }

        return $this;
    }

    public function removeDateInfraction(Infraction $dateInfraction): self
    {
        if ($this->date_infraction->contains($dateInfraction)) {
            $this->date_infraction->removeElement($dateInfraction);
            $dateInfraction->removeTypeInfractionId($this);
        }

        return $this;
    }
}
