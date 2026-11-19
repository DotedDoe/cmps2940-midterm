<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class HealthController extends AbstractController
{
    #[Route('/health', name: 'app_health')]
    public function health(Connection $connection): JsonResponse
    {
        try {
            $connection->executeQuery('SELECT 1');
            return $this->json(['database' => 'ok']);
        } catch (\Throwable $e) {
            return $this->json(['database' => 'error'], 500);
        }
    }
}