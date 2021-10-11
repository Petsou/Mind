<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $immatriculation;

    /**
     * @ORM\OneToMany(targetEntity=AssociationVehiculeConducteur::class, mappedBy="id_vehicule")
     */
    private $associationVehiculeConducteurs;

    public function __construct()
    {
        $this->associationVehiculeConducteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    /**
     * @return Collection|AssociationVehiculeConducteur[]
     */
    public function getAssociationVehiculeConducteurs(): Collection
    {
        return $this->associationVehiculeConducteurs;
    }

    public function addAssociationVehiculeConducteur(AssociationVehiculeConducteur $associationVehiculeConducteur): self
    {
        if (!$this->associationVehiculeConducteurs->contains($associationVehiculeConducteur)) {
            $this->associationVehiculeConducteurs[] = $associationVehiculeConducteur;
            $associationVehiculeConducteur->setIdVehicule($this);
        }

        return $this;
    }

    public function removeAssociationVehiculeConducteur(AssociationVehiculeConducteur $associationVehiculeConducteur): self
    {
        if ($this->associationVehiculeConducteurs->removeElement($associationVehiculeConducteur)) {
            // set the owning side to null (unless already changed)
            if ($associationVehiculeConducteur->getIdVehicule() === $this) {
                $associationVehiculeConducteur->setIdVehicule(null);
            }
        }

        return $this;
    }
}
