<?php

namespace DareIt\NotificationManager\Adapters;

use DareIt\NotificationManager\Notifications\NotificationInterface;

interface AdapterInterface
{

    /**
     * @param NotificationInterface $notification
     */
    public function notify(NotificationInterface $notification): void;
}