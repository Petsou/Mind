<?php

namespace App\Entity;

use App\Repository\AssociationVehiculeConducteurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssociationVehiculeConducteurRepository::class)
 */
class AssociationVehiculeConducteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Conducteur::class, inversedBy="associationVehiculeConducteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_conducteur;

    /**
     * @ORM\ManyToOne(targetEntity=Vehicule::class, inversedBy="associationVehiculeConducteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_vehicule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdConducteur(): ?Conducteur
    {
        return $this->id_conducteur;
    }

    public function setIdConducteur(?Conducteur $id_conducteur): self
    {
        $this->id_conducteur = $id_conducteur;

        return $this;
    }

    public function getIdVehicule(): ?Vehicule
    {
        return $this->id_vehicule;
    }

    public function setIdVehicule(?Vehicule $id_vehicule): self
    {
        $this->id_vehicule = $id_vehicule;

        return $this;
    }
}
