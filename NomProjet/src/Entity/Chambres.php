<?php

namespace App\Entity;

use App\Repository\ChambresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChambresRepository::class)
 */
class Chambres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumeroChambre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $TypeChambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $capaciteChambre;

    /**
     * @ORM\ManyToOne(targetEntity=Hotels::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdHotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroChambre(): ?int
    {
        return $this->NumeroChambre;
    }

    public function setNumeroChambre(int $NumeroChambre): self
    {
        $this->NumeroChambre = $NumeroChambre;

        return $this;
    }

    public function getTypeChambre(): ?string
    {
        return $this->TypeChambre;
    }

    public function setTypeChambre(string $TypeChambre): self
    {
        $this->TypeChambre = $TypeChambre;

        return $this;
    }

    public function getCapaciteChambre(): ?int
    {
        return $this->capaciteChambre;
    }

    public function setCapaciteChambre(int $capaciteChambre): self
    {
        $this->capaciteChambre = $capaciteChambre;

        return $this;
    }

    public function getIdHotel(): ?Hotels
    {
        return $this->IdHotel;
    }

    public function setIdHotel(?Hotels $IdHotel): self
    {
        $this->IdHotel = $IdHotel;

        return $this;
    }
}
