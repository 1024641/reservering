<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StoelRepository")
 */
class Stoel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $max_personen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaxPersonen(): ?int
    {
        return $this->max_personen;
    }

    public function setMaxPersonen(?int $max_personen): self
    {
        $this->max_personen = $max_personen;

        return $this;
    }

    public function __toString()
    {
        return $this->getId() . " ";
    }
}
