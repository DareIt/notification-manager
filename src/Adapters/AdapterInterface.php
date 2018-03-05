<?php

namespace NotificationManager\Adapters;

use NotificationManager\Notifications\NotificationInterface;

interface AdapterInterface
{

    /**
     * @param NotificationInterface $notification
     */
    public function notify(NotificationInterface $notification): void;
}