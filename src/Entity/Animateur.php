<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimateurRepository")
 */
class Animateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Civilite", inversedBy="animateurs")
     */
    private $civilite_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FonctionAnimateur", inversedBy="animateurs")
     */
    private $fonction_animateur_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StatutAnimateur", inversedBy="animateurs")
     */
    private $statut_id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $raison_sociale;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel_portable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel_fixe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urssaf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $siret;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ForfaitAnimateur", inversedBy="animateurs")
     */
    private $forfait_animateur_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $km_a_r;

    /**
     * @ORM\Column(type="boolean")
     */
    private $repas;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Stage", inversedBy="animateurs")
     */
    private $stage_id;

    public function __construct()
    {
        $this->stage_id = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCiviliteId(): ?Civilite
    {
        return $this->civilite_id;
    }

    public function setCiviliteId(?Civilite $civilite_id): self
    {
        $this->civilite_id = $civilite_id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getFonctionAnimateurId(): ?FonctionAnimateur
    {
        return $this->fonction_animateur_id;
    }

    public function setFonctionAnimateurId(?FonctionAnimateur $fonction_animateur_id): self
    {
        $this->fonction_animateur_id = $fonction_animateur_id;

        return $this;
    }

    public function getStatutId(): ?StatutAnimateur
    {
        return $this->statut_id;
    }

    public function setStatutId(?StatutAnimateur $statut_id): self
    {
        $this->statut_id = $statut_id;

        return $this;
    }

    public function getGta(): ?bool
    {
        return $this->gta;
    }

    public function setGta(bool $gta): self
    {
        $this->gta = $gta;

        return $this;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raison_sociale;
    }

    public function setRaisonSociale(?string $raison_sociale): self
    {
        $this->raison_sociale = $raison_sociale;

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

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getTelPortable(): ?string
    {
        return $this->tel_portable;
    }

    public function setTelPortable(?string $tel_portable): self
    {
        $this->tel_portable = $tel_portable;

        return $this;
    }

    public function getTelFixe(): ?string
    {
        return $this->tel_fixe;
    }

    public function setTelFixe(?string $tel_fixe): self
    {
        $this->tel_fixe = $tel_fixe;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUrssaf(): ?string
    {
        return $this->urssaf;
    }

    public function setUrssaf(?string $urssaf): self
    {
        $this->urssaf = $urssaf;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getForfaitAnimateurId(): ?ForfaitAnimateur
    {
        return $this->forfait_animateur_id;
    }

    public function setForfaitAnimateurId(?ForfaitAnimateur $forfait_animateur_id): self
    {
        $this->forfait_animateur_id = $forfait_animateur_id;

        return $this;
    }

    public function getKmAR(): ?int
    {
        return $this->km_a_r;
    }

    public function setKmAR(?int $km_a_r): self
    {
        $this->km_a_r = $km_a_r;

        return $this;
    }

    public function getRepas(): ?bool
    {
        return $this->repas;
    }

    public function setRepas(bool $repas): self
    {
        $this->repas = $repas;

        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getStageId(): Collection
    {
        return $this->stage_id;
    }

    public function addStageId(Stage $stageId): self
    {
        if (!$this->stage_id->contains($stageId)) {
            $this->stage_id[] = $stageId;
        }

        return $this;
    }

    public function removeStageId(Stage $stageId): self
    {
        if ($this->stage_id->contains($stageId)) {
            $this->stage_id->removeElement($stageId);
        }

        return $this;
    }
}
