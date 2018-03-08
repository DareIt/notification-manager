<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification;

use DareIt\NotificationManager\Map\InMemoryNotificationHandlerMap;
use DareIt\NotificationManager\NotificationManager;
use DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification\Adapters\InMemoryAdapter;
use DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification\Handlers\BasicAHandler;
use DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification\Handlers\BasicBHandler;
use DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification\Notifications\Basic1Notification;
use DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification\Notifications\Basic2Notification;
use DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification\Notifications\Basic3Notification;
use PHPUnit\Framework\TestCase;

final class BasicNotificationManagerTest extends TestCase
{
    /**
     * @test
     */
    public function basicFlowOfNotificationManager()
    {
        $handlerA = new BasicAHandler('foo');
        $handlerB = new BasicBHandler('bar');

        $map = new InMemoryNotificationHandlerMap();
        $map->mapNotificationToHandler(Basic1Notification::class, $handlerA);
        $map->mapNotificationToHandler(Basic2Notification::class, $handlerB);
        $map->mapNotificationToHandler(Basic3Notification::class, $handlerB);

        $notificationManager = new NotificationManager($map);

        $notification1 = new Basic1Notification('foo1', 'bar1');
        $notificationManager->dispatch($notification1);

        $notification2 = new Basic3Notification('foo2', 'bar2');
        $notificationManager->dispatch($notification2);

        $notification3 = new Basic3Notification('foo3', 'bar3');
        $notificationManager->dispatch($notification3);

        $notification4 = new Basic1Notification('foo11', 'bar11');
        $notificationManager->dispatch($notification4);


        $this->assertEquals(array_shift(InMemoryAdapter::$notifiedData['foo']), json_encode((array) $notification1));
        $this->assertEquals(array_shift(InMemoryAdapter::$notifiedData['bar']), json_encode((array) $notification2));
        $this->assertEquals(array_shift(InMemoryAdapter::$notifiedData['bar']), json_encode((array) $notification3));
        $this->assertEquals(array_shift(InMemoryAdapter::$notifiedData['foo']), json_encode((array) $notification4));
    }
}