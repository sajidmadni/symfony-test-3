<?php
// users/src/Message/UserCreatedEvent.php
namespace App\Message;
use App\Entity\User;

class UserCreatedEvent
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}