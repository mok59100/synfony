<?php

namespace App\Entity;

use App\Repository\HotelsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HotelsRepository::class)
 */
class Hotels
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $LibelleHotel;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $CodePostal;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Ville;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $CategorieHotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleHotel(): ?string
    {
        return $this->LibelleHotel;
    }

    public function setLibelleHotel(string $LibelleHotel): self
    {
        $this->LibelleHotel = $LibelleHotel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->CodePostal;
    }

    public function setCodePostal(int $CodePostal): self
    {
        $this->CodePostal = $CodePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getCategorieHotel(): ?string
    {
        return $this->CategorieHotel;
    }

    public function setCategorieHotel(string $CategorieHotel): self
    {
        $this->CategorieHotel = $CategorieHotel;

        return $this;
    }

    public function __toString(){

        return $this->getLibelleHotel();
    }
}
