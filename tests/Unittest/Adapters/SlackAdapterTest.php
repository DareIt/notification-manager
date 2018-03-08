<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Tests\Adapters;

use DareIt\NotificationManager\Adapters\SlackAdapter;
use DareIt\NotificationManager\Tests\TestHelpers\NotificationTestHelper;
use DareIt\NotificationManager\Tests\TestHelpers\SlackClientTestHelper;
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