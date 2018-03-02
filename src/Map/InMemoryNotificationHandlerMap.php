<?php
declare(strict_types=1);

namespace NotificationManager\Map;

use NotificationManager\Exceptions\NotFoundNotificationException;
use NotificationManager\Handlers\HandlerInterface;
use NotificationManager\Notifications\NotificationInterface;

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
     * @param NotificationInterface $notification
     * @param HandlerInterface      $handler
     */
    public function mapNotificationAndHandler(NotificationInterface $notification, HandlerInterface $handler): void
    {
        $this->notificationHandlerCollection[get_class($notification)] = $handler;
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