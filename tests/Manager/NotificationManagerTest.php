<?php
declare(strict_types=1);

namespace NotificationManager\Tests\Manager;

use NotificationManager\Map\InMemoryNotificationHandlerMap;
use NotificationManager\NotificationManager;
use NotificationManager\Notifications\NotificationInterface;
use NotificationManager\Tests\TestHelpers\HandlerTestHelper;
use NotificationManager\Tests\TestHelpers\LoggerTestHelper;
use NotificationManager\Tests\TestHelpers\NotificationTestHelper;
use NotificationManager\Tests\TestHelpers\NotifierTestHelper;
use PHPUnit\Framework\TestCase;

final class NotificationManagerTest extends TestCase
{
    /**
     * @test
     */
    public function canHandelNotificationEnWriteThem()
    {
        $handler = HandlerTestHelper::get($this);
        $testData = ['foo' => 'foo', 'bar' => 'bar', 'fooBar' => 'fooBar'];
        $notification = NotificationTestHelper::get($this, $testData);

        $notificationHandlerMap = new InMemoryNotificationHandlerMap();
        $notificationHandlerMap->mapNotificationAndHandler($notification, $handler);

        $testLogger = LoggerTestHelper::get();

        $notificationManager = new NotificationManager($notificationHandlerMap, $testLogger);
        $notificationManager->dispatch($notification);

        $this->assertCount(1, NotifierTestHelper::$notifications);
        $notifications = NotifierTestHelper::$notifications;
        $notification = array_shift($notifications);
        $this->assertInstanceOf(NotificationInterface::class, $notification);
    }

}