<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DatabaseOrderRepository")
 */
class PizzaOrder
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="string")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Pizza", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $pizza;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UpdatePreference")
     */
    private $updatePreference;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Business", inversedBy="pizzaOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $business;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $status = 'received';

    /**
     * @var string
     */
    private $oldStatus;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPizza(): ?Pizza
    {
        return $this->pizza;
    }

    public function setPizza(Pizza $pizza): self
    {
        $this->pizza = $pizza;

        return $this;
    }

    public function getUpdatePreference(): ?UpdatePreference
    {
        return $this->updatePreference;
    }

    public function setUpdatePreference(?UpdatePreference $updatePreference): self
    {
        $this->updatePreference = $updatePreference;

        return $this;
    }

    public function getBusiness(): ?Business
    {
        return $this->business;
    }

    public function setBusiness(?Business $business): self
    {
        $this->business = $business;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->oldStatus = $this->status;
        $this->status    = $status;

        return $this;
    }

    public function statusChanged(): bool
    {
        return $this->oldStatus !== null && $this->status !== $this->oldStatus;
    }

    public function getTotalCost(): int
    {
        $pizza = $this->getPizza();
        return $pizza->getBottom()->getCost() + $pizza->getTopping()->getCost();
    }
}
