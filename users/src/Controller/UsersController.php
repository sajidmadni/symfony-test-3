<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Message\UserCreatedEvent;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'app_users', methods: ['POST'])]
    public function createUser(Request $request, EntityManagerInterface $entityManager, MessageBusInterface $messageBus): JsonResponse
    {
        // Validate incoming JSON data
        $data = json_decode($request->getContent(), true);
        
        // User entity class
        $user = new User();
        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setEmail($data['email']);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();


         // Dispatch event
         $messageBus->dispatch(new UserCreatedEvent($user));
        
        return new JsonResponse(['message' => 'User created successfully'], JsonResponse::HTTP_CREATED);
    }
}
