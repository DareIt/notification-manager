<?php

namespace DareIt\NotificationManager\Handlers;

use DareIt\NotificationManager\Notifications\NotificationInterface;

interface HandlerInterface
{

    /**
     * @param NotificationInterface $notification
     */
    public function handle(NotificationInterface $notification);

}