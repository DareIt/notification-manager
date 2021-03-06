<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Tests\Notifications;

use DareIt\NotificationManager\Notifications\AbstractMailNotification;
use DareIt\NotificationManager\Notifications\AbstractSlackNotification;
use DareIt\NotificationManager\Notifications\MailNotificationInterface;
use DareIt\NotificationManager\Notifications\NotificationInterface;
use DareIt\NotificationManager\Notifications\SlackNotificationInterface;
use DareIt\NotificationManager\Tests\TestHelpers\NotificationTestHelper;
use PHPUnit\Framework\TestCase;

final class NotificationTest extends TestCase
{

    /**
     * @test
     */
    public function canCreateNotification()
    {
        $notification = NotificationTestHelper::get($this, ['foo' => 'foo']);
        $this->assertInstanceOf(NotificationInterface::class, $notification);
        $this->assertEquals('foo', $notification->foo);

    }

    /**
     * @test
     */
    public function canCreateMailNotification()
    {
        /** @var AbstractMailNotification $mailNotification */
        $mailNotification = NotificationTestHelper::getMail($this);
        $this->assertInstanceOf(MailNotificationInterface::class, $mailNotification);
        $this->assertEquals('receiver@domain.org', $mailNotification->getTo());
        $this->assertEquals('Here is the message itself', $mailNotification->getMessage());
    }

    /**
     * @test
     */
    public function canCreateSlackNotification()
    {
        /** @var AbstractSlackNotification $slackNotification */
        $slackNotification = NotificationTestHelper::getSlack($this);
        $this->assertInstanceOf(SlackNotificationInterface::class, $slackNotification);
        $this->assertEquals('foo', $slackNotification->getTo());
        $this->assertEquals('bar', $slackNotification->getMessage());
    }

}