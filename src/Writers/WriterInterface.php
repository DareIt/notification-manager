<?php

namespace NotificationManager\Writers;

use NotificationManager\Notifications\NotificationInterface;

interface WriterInterface
{

    /**
     * @param NotificationInterface $notification
     */
    public function write(NotificationInterface $notification): void;
}