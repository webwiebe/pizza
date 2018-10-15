<?php

namespace App\Controller;

use App\Entity\PizzaOrder;
use App\Form\PizzaOrderType;
use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    /**
     * @Route("/order", name="order", methods={"GET", "POST"})
     * @param Request $request
     * @param OrderService $orderService
     * @return Response
     */
    public function order(
        Request $request,
        OrderService $orderService
    ): Response {
        $form = $this->createForm(PizzaOrderType::class, null);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // hand off to the order service to store the submitted data.
            /** @var PizzaOrder $order */
            $order = $form->getData();
            try {
                $orderService->save($order);
                $this->addFlash('success', 'Order placed succesfully');

                return $this->redirectToRoute('order_view', ['order' => $order->getId()]);
            } catch (\Exception $e) {
                $this->addFlash('error', 'Something went terribly wrong ' . $e->getMessage());
                return $this->redirectToRoute('index');
            }
        }
        return $this->render('order/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/order/{order}", name="order_view", methods={"GET"})
     * @param PizzaOrder $order
     * @return Response
     */
    public function view(
        PizzaOrder $order
    ): Response {
        return $this->render('order/view.html.twig', [
            'order' => $order
        ]);
    }
}
