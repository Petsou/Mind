<?php

namespace App\Entity;

use App\Repository\ConducteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConducteurRepository::class)
 */
class Conducteur
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=AssociationVehiculeConducteur::class, mappedBy="id_conducteur")
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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
            $associationVehiculeConducteur->setIdConducteur($this);
        }

        return $this;
    }

    public function removeAssociationVehiculeConducteur(AssociationVehiculeConducteur $associationVehiculeConducteur): self
    {
        if ($this->associationVehiculeConducteurs->removeElement($associationVehiculeConducteur)) {
            // set the owning side to null (unless already changed)
            if ($associationVehiculeConducteur->getIdConducteur() === $this) {
                $associationVehiculeConducteur->setIdConducteur(null);
            }
        }

        return $this;
    }
}
