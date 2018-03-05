<?php
declare(strict_types=1);

namespace NotificationManager\Tests\Adapters;

use NotificationManager\Adapters\SlackAdapter;
use NotificationManager\Tests\TestHelpers\NotificationTestHelper;
use NotificationManager\Tests\TestHelpers\SlackClientTestHelper;
use PHPUnit\Framework\TestCase;

final class SlackAdapterTest extends TestCase
{
    /**
     * @test
     */
    public function canNotifyBySlackOnNotification()
    {
        $client = SlackClientTestHelper::get($this);
        $slackNotifier = new SlackAdapter($client);

        $slackNotification = NotificationTestHelper::getSlack($this);
        $slackNotifier->notify($slackNotification);

        $message = SlackClientTestHelper::$message;
        $this->assertEquals('bar', $message->getText());
        $this->assertEquals('foo', $message->getChannel());
    }
}