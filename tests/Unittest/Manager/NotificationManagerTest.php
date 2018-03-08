<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Tests\Manager;

use DareIt\NotificationManager\Map\InMemoryNotificationHandlerMap;
use DareIt\NotificationManager\NotificationManager;
use DareIt\NotificationManager\Notifications\MailNotificationInterface;
use DareIt\NotificationManager\Notifications\NotificationInterface;
use DareIt\NotificationManager\Tests\TestHelpers\HandlerTestHelper;
use DareIt\NotificationManager\Tests\TestHelpers\NotificationTestHelper;
use DareIt\NotificationManager\Tests\TestHelpers\AdapterTestHelper;
use PHPUnit\Framework\TestCase;

final class NotificationManagerTest extends TestCase
{
    /**
     * @test
     */
    public function canHandelNotification()
    {
        $handler = HandlerTestHelper::get($this);
        $testData = ['foo' => 'foo', 'bar' => 'bar', 'fooBar' => 'fooBar'];
        $notification = NotificationTestHelper::get($this, $testData);

        $notificationHandlerMap = new InMemoryNotificationHandlerMap();
        $notificationHandlerMap->mapNotificationToHandler($notification, $handler);

        $notificationManager = new NotificationManager($notificationHandlerMap);
        $notificationManager->dispatch($notification);

        $this->assertCount(1, AdapterTestHelper::$notifications);
        $notifications = AdapterTestHelper::$notifications;
        $notification = array_shift($notifications);
        $this->assertInstanceOf(NotificationInterface::class, $notification);
    }

    /**
     * @test
     */
    public function canHandleMailNotification()
    {
        $mailNotification = NotificationTestHelper::getMail($this);

        $mailHandler = HandlerTestHelper::getMail($this);

        $notificationHandlerMap = new InMemoryNotificationHandlerMap();
        $notificationHandlerMap->mapNotificationToHandler($mailNotification, $mailHandler);

        $notificationManager = new NotificationManager($notificationHandlerMap);
        $notificationManager->dispatch($mailNotification);

        $this->assertInstanceOf(MailNotificationInterface::class, HandlerTestHelper::$handledNotification);
    }

    /**
     * @test
     */
    public function canHandleSlackNotification()
    {
        $this->assertTrue(true);
    }

}