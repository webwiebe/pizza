<?php

namespace App\Controller;

use App\Entity\PizzaOrder;
use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManagementController extends AbstractController
{
    /**
     * @Route("/order/{order}/finish", name="order_finish", methods={"GET"})
     * @param PizzaOrder $order
     * @param OrderService $orderService
     * @return Response
     */
    public function finish(
        PizzaOrder $order,
        OrderService $orderService
    ): Response {
        $order->setStatus('finished');
        $orderService->save($order);
        $this->addFlash('success', 'finished order');
        return $this->redirectToRoute('manage');
    }

    /**
     * @Route("/manage", name="manage")
     * @param OrderService $orderService
     * @return Response
     */
    public function manage(OrderService $orderService): Response
    {
        $orders = $orderService->getAllOrders();
        return $this->render('order/manage.html.twig', [
            'orders' => $orders,
        ]);
    }
}