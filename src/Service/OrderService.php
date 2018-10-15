<?php

namespace App\Service;

use App\Entity\PizzaOrder;
use App\Event\OrderSavedEvent;
use App\Repository\OrderStorageInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class OrderService
{
    /** @var OrderStorageInterface */
    protected $repository;

    /** @var EventDispatcherInterface */
    protected $dispatcher;

    /**
     * @param OrderStorageInterface $repository
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(
        OrderStorageInterface $repository,
        EventDispatcherInterface $dispatcher
    ) {
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

    public function save(PizzaOrder $order): void
    {
        $this->repository->save($order);
        $event = new OrderSavedEvent($order);

        $this->dispatcher->dispatch(OrderSavedEvent::EVENT_NAME, $event);
    }

    public function getAllOrders(): ?array
    {
        return $this->repository->getAllOrders();
    }
}