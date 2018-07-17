<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StagiaireRepository")
 */
class Stagiaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Civilite", inversedBy="stagiaires")
     */
    private $civilite_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu_naissance;

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
    private $pays;

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
     * @ORM\Column(type="boolean")
     */
    private $carte_avantages_jeunes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $partenaires;

    /**
     * @ORM\Column(type="boolean")
     */
    private $adherents;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Permis", mappedBy="stagiaire_id", cascade={"persist", "remove"})
     */
    private $permis;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LiaisonStagiaireStageDossierCasBordereau", inversedBy="stagiaire_id")
     */

    private $liaisonStagiaireStageDossierCasBordereau;

    public function __toString() {
      
        return $this->nom. ' ' .$this->prenom;
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

    public function getNomNaissance(): ?string
    {
        return $this->nom_naissance;
    }

    public function setNomNaissance(?string $nom_naissance): self
    {
        $this->nom_naissance = $nom_naissance;

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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieu_naissance;
    }

    public function setLieuNaissance(?string $lieu_naissance): self
    {
        $this->lieu_naissance = $lieu_naissance;

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

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

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

    public function getCarteAvantagesJeunes(): ?bool
    {
        return $this->carte_avantages_jeunes;
    }

    public function setCarteAvantagesJeunes(?bool $carte_avantages_jeunes): self
    {
        $this->carte_avantages_jeunes = $carte_avantages_jeunes;

        return $this;
    }

    public function getPartenaires(): ?bool
    {
        return $this->partenaires;
    }

    public function setPartenaires(?bool $partenaires): self
    {
        $this->partenaires = $partenaires;

        return $this;
    }

    public function getAdherents(): ?bool
    {
        return $this->adherents;
    }

    public function setAdherents(?bool $adherents): self
    {
        $this->adherents = $adherents;

        return $this;
    }

    public function getPermis(): ?Permis
    {
        return $this->permis;
    }

    public function setPermis(?Permis $permis): self
    {
        $this->permis = $permis;

        // set (or unset) the owning side of the relation if necessary
        $newStagiaire_id = $permis === null ? null : $this;
        if ($newStagiaire_id !== $permis->getStagiaireId()) {
            $permis->setStagiaireId($newStagiaire_id);
        }

        return $this;
    }

    public function getLiaisonStagiaireStageDossierCasBordereau(): ?LiaisonStagiaireStageDossierCasBordereau
    {
        return $this->liaisonStagiaireStageDossierCasBordereau;
    }

    public function setLiaisonStagiaireStageDossierCasBordereau(?LiaisonStagiaireStageDossierCasBordereau $liaisonStagiaireStageDossierCasBordereau): self
    {
        $this->liaisonStagiaireStageDossierCasBordereau = $liaisonStagiaireStageDossierCasBordereau;

        return $this;
    }
}
