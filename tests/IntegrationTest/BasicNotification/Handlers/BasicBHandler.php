<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification\Handlers;

use DareIt\NotificationManager\Adapters\AdapterInterface;
use DareIt\NotificationManager\Exceptions\WrongNotificationInterfaceException;
use DareIt\NotificationManager\Handlers\HandlerInterface;
use DareIt\NotificationManager\Notifications\NotificationInterface;
use DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification\Adapters\InMemoryAdapter;
use DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification\Notifications\BasicNotificationInterface;

final class BasicBHandler implements HandlerInterface
{
    /** @var AdapterInterface */
    private $adapter;

    /** @var string */
    private $arrayKey;

    /**
     * BasicAHandler constructor.
     * @param string $arrayKey
     */
    public function __construct(string $arrayKey)
    {
        $this->adapter = new InMemoryAdapter();
        $this->arrayKey = $arrayKey;
    }

    /**
     * @param NotificationInterface $notification
     * @throws WrongNotificationInterfaceException
     */
    public function handle(NotificationInterface $notification)
    {
        if (!$notification instanceof BasicNotificationInterface) {
            throw new WrongNotificationInterfaceException(get_class($notification));
        }
        $this->adapter->setArrayKey($this->arrayKey);

        $this->adapter->notify($notification);
    }

}