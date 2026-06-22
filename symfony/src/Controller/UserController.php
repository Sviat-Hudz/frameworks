<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/api/users')]
class UserController extends AbstractController {
    #[Route('', methods: ['GET'])]
    public function index(): JsonResponse { return new JsonResponse(['action' => 'Read All']); }
    #[Route('', methods: ['POST'])]
    public function create(): JsonResponse { return new JsonResponse(['action' => 'Create'], 201); }
    #[Route('/{id}', methods: ['PATCH'])]
    public function update($id): JsonResponse { return new JsonResponse(['action' => "Update $id"]); }
    #[Route('/{id}', methods: ['DELETE'])]
    public function delete($id): JsonResponse { return new JsonResponse(['action' => "Delete $id"]); }
}
