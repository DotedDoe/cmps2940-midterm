<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Session\FlashBagAwareSessionInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

#[AsEventListener]
class LoginSuccessListener
{
    public function __invoke(LoginSuccessEvent $event): void
    {
        $session = $event->getRequest()->getSession();
        if ($session instanceof FlashBagAwareSessionInterface) {
            $session->getFlashBag()->add(
                'success',
                'Welcome back, ' . $event->getUser()->getUserIdentifier() . '!'
            );
        }
    }
}