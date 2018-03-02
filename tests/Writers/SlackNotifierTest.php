<?php
declare(strict_types=1);

namespace NotificationManager\Tests\Writers;

use NotificationManager\Notifiers\SlackNotifier;
use NotificationManager\Tests\TestHelpers\NotificationTestHelper;
use NotificationManager\Tests\TestHelpers\SlackClientTestHelper;
use PHPUnit\Framework\TestCase;

final class SlackNotifierTest extends TestCase
{
    /**
     * @test
     */
    public function canNotifyBySlackOnNotification()
    {
        $client = SlackClientTestHelper::get($this);
        $slackNotifier = new SlackNotifier($client);

        $slackNotification = NotificationTestHelper::getSlack($this);
        $slackNotifier->notify($slackNotification);

        $message = SlackClientTestHelper::$message;
        $this->assertEquals('bar', $message->getText());
        $this->assertEquals('foo', $message->getChannel());
    }
}