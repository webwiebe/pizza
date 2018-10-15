<?php

namespace App\Event;

use App\Entity\PizzaOrder;
use Symfony\Component\EventDispatcher\Event;

class OrderSavedEvent extends Event
{
    public const EVENT_NAME = 'order.saved';

    /** @var PizzaOrder */
    protected $order;

    /**
     * @param PizzaOrder $order
     */
    public function __construct(PizzaOrder $order)
    {
        $this->order = $order;
    }

    public function getOrder(): PizzaOrder
    {
        return $this->order;
    }

    public function setOrder(PizzaOrder $order): self
    {
        $this->order = $order;
        return $this;
    }
}