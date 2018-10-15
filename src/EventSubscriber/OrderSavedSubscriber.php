<?php

namespace App\EventSubscriber;

use App\Event\OrderSavedEvent;
use App\Notification\StatusUpdateNotificationInterface;
use IteratorAggregate;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OrderSavedSubscriber implements EventSubscriberInterface
{
    /** @var IteratorAggregate |StatusUpdateNotificationInterface[] */
    protected $notificationServices;

    /**
     * @param \IteratorAggregate $notificationServices
     */
    public function __construct(IteratorAggregate $notificationServices)
    {
        $this->notificationServices = $notificationServices;
    }

    public function onOrderSaved(OrderSavedEvent $event): void
    {
        // notify customer using the preferred method
        $order = $event->getOrder();
        if (!$order->statusChanged()) {
            // nothing to do
            return;
        }

        foreach ($this->notificationServices as $notificationService) {
            if ($notificationService->supports($order->getUpdatePreference())) {
                $notificationService->notify($order);
            }
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            'order.saved' => 'onOrderSaved',
        ];
    }
}
