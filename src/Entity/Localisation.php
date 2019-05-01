<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocalisationRepository")
 */
class Localisation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $locationName;

    /**
     * @ORM\Column(type="float")
     */
    private $locationLat;

    /**
     * @ORM\Column(type="float")
     */
    private $LocationLon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $locationCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocationName(): ?string
    {
        return $this->locationName;
    }

    public function setLocationName(string $locationName): self
    {
        $this->locationName = $locationName;

        return $this;
    }

    public function getLocationLat(): ?float
    {
        return $this->locationLat;
    }

    public function setLocationLat(float $locationLat): self
    {
        $this->locationLat = $locationLat;

        return $this;
    }

    public function getLocationLon(): ?float
    {
        return $this->LocationLon;
    }

    public function setLocationLon(float $LocationLon): self
    {
        $this->LocationLon = $LocationLon;

        return $this;
    }

    public function getLocationCategory(): ?string
    {
        return $this->locationCategory;
    }

    public function setLocationCategory(string $locationCategory): self
    {
        $this->locationCategory = $locationCategory;

        return $this;
    }
}
