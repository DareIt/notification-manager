<?php

namespace NotificationManager\Handlers;

use NotificationManager\Notifications\NotificationInterface;

interface HandlerInterface
{

    /**
     * @param NotificationInterface $notification
     */
    public function handle(NotificationInterface $notification);

}