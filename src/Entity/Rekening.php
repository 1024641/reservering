<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RekeningRepository")
 */
class Rekening
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Producten")
     */
    private $producten;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Stoel", cascade={"persist", "remove"})
     */
    private $Tafel;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reservering", cascade={"persist", "remove"})
     */
    private $reservering;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProducten(): ?Producten
    {
        return $this->producten;
    }

    public function setProducten(?Producten $producten): self
    {
        $this->producten = $producten;

        return $this;
    }

    public function getTafel(): ?Stoel
    {
        return $this->Tafel;
    }

    public function setTafel(?Stoel $Tafel): self
    {
        $this->Tafel = $Tafel;

        return $this;
    }

    public function getReservering(): ?Reservering
    {
        return $this->reservering;
    }

    public function setReservering(?Reservering $reservering): self
    {
        $this->reservering = $reservering;

        return $this;
    }

    public function getTags()
    {
        return $this->tags;
    }
}
