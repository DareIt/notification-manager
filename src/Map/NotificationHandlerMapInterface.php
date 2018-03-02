<?php

namespace NotificationManager\Map;

use NotificationManager\Handlers\HandlerInterface;
use NotificationManager\Notifications\NotificationInterface;

interface NotificationHandlerMapInterface
{

    /**
     * @param NotificationInterface $notification
     * @return HandlerInterface
     */
    public function getHandler(NotificationInterface $notification): HandlerInterface;

}