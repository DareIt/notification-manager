<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Map;

use DareIt\NotificationManager\Exceptions\NotFoundNotificationException;
use DareIt\NotificationManager\Handlers\HandlerInterface;
use DareIt\NotificationManager\Notifications\NotificationInterface;

final class InMemoryNotificationHandlerMap implements NotificationHandlerMapInterface
{
    /** @var array */
    private $notificationHandlerCollection;

    /**
     * InMemoryNotificationHandlerMap constructor.
     */
    public function __construct()
    {
        $this->notificationHandlerCollection = [];
    }

    /**
     * @param string           $notificationClass
     * @param HandlerInterface $handler
     */
    public function mapNotificationToHandler(string $notificationClass, HandlerInterface $handler): void
    {
        $this->notificationHandlerCollection[$notificationClass] = $handler;
    }

    /**
     * @param NotificationInterface $notification
     * @return HandlerInterface
     * @throws NotFoundNotificationException
     */
    public function getHandler(NotificationInterface $notification): HandlerInterface
    {
        if (!$this->notificationsExists($notification)) {
            throw new NotFoundNotificationException(get_class($notification));
        }

        return $this->notificationHandlerCollection[get_class($notification)];
    }

    /**
     * @param NotificationInterface $notification
     * @return bool
     */
    private function notificationsExists(NotificationInterface $notification): bool
    {
        return isset($this->notificationHandlerCollection[get_class($notification)]);
    }
}