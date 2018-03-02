<?php

namespace NotificationManager\Notifiers;

use NotificationManager\Notifications\NotificationInterface;

interface NotifierInterface
{

    /**
     * @param NotificationInterface $notification
     */
    public function notify(NotificationInterface $notification): void;
}