<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/employee')]
#[IsGranted('ROLE_EMPLOYEE')]
class EmployeeController extends AbstractController
{
    #[Route('', name: 'employee_dashboard')]
    public function dashboard(EntityManagerInterface $em): Response
    {
        $orders = $em->getRepository(Order::class)->findBy([], ['createdAt' => 'DESC']);

        return $this->render('employee/dashboard.html.twig', ['orders' => $orders]);
    }

    #[Route('/orders/{id}/advance', name: 'employee_order_advance', methods: ['POST'])]
    public function advance(Order $order, Request $request, EntityManagerInterface $em): Response
    {
        if (!$this->isCsrfTokenValid('advance' . $order->getId(), $request->request->getString('_token'))) {
            throw $this->createAccessDeniedException('Invalid CSRF token.');
        }

        $next = $order->getStatus()->next();
        if ($next === null) {
            $this->addFlash('error', sprintf('Order #%d is already fulfilled.', $order->getId()));
        } else {
            $order->setStatus($next);
            $em->flush();
            $this->addFlash('success', sprintf('Order #%d is now %s.', $order->getId(), $next->label()));
        }

        return $this->redirectToRoute('employee_dashboard');
    }
}