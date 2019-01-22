<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BonRepository")
 */
class Bon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Producten")
     */
    private $product;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reservering", cascade={"persist", "remove"})
     */
    private $rekening;

    public function __construct()
    {
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Producten[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Producten $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
        }

        return $this;
    }

    public function removeProduct(Producten $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
        }

        return $this;
    }

    public function getRekening(): ?reservering
    {
        return $this->rekening;
    }

    public function setRekening(?reservering $rekening): self
    {
        $this->rekening = $rekening;

        return $this;
    }
}
