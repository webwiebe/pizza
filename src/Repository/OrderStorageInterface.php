<?php

namespace App\Repository;

use App\Entity\PizzaOrder;

interface OrderStorageInterface
{
    public function save(PizzaOrder $order): void;

    /**
     * @return PizzaOrder[]
     */
    public function getAllOrders(): ?array;
}