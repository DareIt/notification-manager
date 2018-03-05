<?php

namespace DareIt\NotificationManager\Map;

use DareIt\NotificationManager\Handlers\HandlerInterface;
use DareIt\NotificationManager\Notifications\NotificationInterface;

interface NotificationHandlerMapInterface
{

    /**
     * @param NotificationInterface $notification
     * @return HandlerInterface
     */
    public function getHandler(NotificationInterface $notification): HandlerInterface;

}