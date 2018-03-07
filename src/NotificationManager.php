<?php
declare(strict_types=1);

namespace DareIt\NotificationManager;

use DareIt\NotificationManager\Map\NotificationHandlerMapInterface;
use DareIt\NotificationManager\Notifications\NotificationInterface;
use Psr\Log\LoggerInterface;

final class NotificationManager
{
    /** @var NotificationHandlerMapInterface */
    private $notificationHandlerMap;

    /**
     * NotificationManager constructor.
     * @param NotificationHandlerMapInterface $notificationHandlerMap
     */
    public function __construct(NotificationHandlerMapInterface $notificationHandlerMap)
    {
        $this->notificationHandlerMap = $notificationHandlerMap;
    }

    /**
     * @param NotificationInterface $notification
     */
    public function dispatch(NotificationInterface $notification): void
    {
        $handler = $this->notificationHandlerMap->getHandler($notification);
        $handler->handle($notification);
    }
}