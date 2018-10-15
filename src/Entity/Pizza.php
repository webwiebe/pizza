<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PizzaRepository")
 */
class Pizza
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="string")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PizzaBottom")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bottom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PizzaTopping")
     * @ORM\JoinColumn(nullable=false)
     */
    private $topping;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getBottom(): ?PizzaBottom
    {
        return $this->bottom;
    }

    public function setBottom(PizzaBottom $bottom): self
    {
        $this->bottom = $bottom;

        return $this;
    }

    public function getTopping(): ?PizzaTopping
    {
        return $this->topping;
    }

    public function setTopping(PizzaTopping $topping): self
    {
        $this->topping = $topping;

        return $this;
    }

    public function __toString()
    {
        return $this->bottom . ' ' . $this->topping;
    }
}
