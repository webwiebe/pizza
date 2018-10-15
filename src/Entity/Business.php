<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BusinessRepository")
 */
class Business
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="string")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $takeOut;

    /**
     * @ORM\Column(type="boolean")
     */
    private $delivery;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PizzaOrder", mappedBy="business", orphanRemoval=true)
     */
    private $pizzaOrders;

    public function __construct()
    {
        $this->pizzaOrders = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTakeOut(): ?bool
    {
        return $this->takeOut;
    }

    public function setTakeOut(bool $takeOut): self
    {
        $this->takeOut = $takeOut;

        return $this;
    }

    public function getDelivery(): ?bool
    {
        return $this->delivery;
    }

    public function setDelivery(bool $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|PizzaOrder[]
     */
    public function getPizzaOrders(): Collection
    {
        return $this->pizzaOrders;
    }

    public function addPizzaOrder(PizzaOrder $pizzaOrder): self
    {
        if (!$this->pizzaOrders->contains($pizzaOrder)) {
            $this->pizzaOrders[] = $pizzaOrder;
            $pizzaOrder->setBusiness($this);
        }

        return $this;
    }

    public function removePizzaOrder(PizzaOrder $pizzaOrder): self
    {
        if ($this->pizzaOrders->contains($pizzaOrder)) {
            $this->pizzaOrders->removeElement($pizzaOrder);
            // set the owning side to null (unless already changed)
            if ($pizzaOrder->getBusiness() === $this) {
                $pizzaOrder->setBusiness(null);
            }
        }

        return $this;
    }
}