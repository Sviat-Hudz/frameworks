<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route; // Змінено на Attribute

#[Route('/api', name: 'api_')]
class UserController extends AbstractController
{
    private const USERS = [
        ['id' => 1, 'name' => 'Святослав', 'email' => 'sviat@example.com'],
        ['id' => 2, 'name' => 'Іван', 'email' => 'ivan@example.com'],
    ];

    #[Route('/users', name: 'users_index', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return $this->json(self::USERS);
    }

    #[Route('/users/{id}', name: 'users_show', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $user = array_filter(self::USERS, fn($u) => $u['id'] === $id);
        $foundUser = reset($user);

        if (!$foundUser) {
            return $this->json(['message' => 'Not found'], 404);
        }

        return $this->json($foundUser);
    }

    #[Route('/users', name: 'users_store', methods: ['POST'])]
    public function store(): JsonResponse
    {
        return $this->json(['status' => 'created'], 201);
    }

    #[Route('/users/{id}', name: 'users_update', methods: ['PATCH'])]
    public function update(int $id): JsonResponse
    {
        return $this->json(['status' => "updated $id"]);
    }

    #[Route('/users/{id}', name: 'users_destroy', methods: ['DELETE'])]
    public function destroy(int $id): JsonResponse
    {
        return $this->json(['status' => "deleted $id"]);
    }
}
