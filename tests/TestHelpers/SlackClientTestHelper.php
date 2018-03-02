<?php
declare(strict_types=1);

namespace NotificationManager\Tests\TestHelpers;

use Maknz\Slack\Client;
use Maknz\Slack\Message;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class SlackClientTestHelper
{
    /** @var Message */
    public static $message;

    /**
     * @param TestCase $testCase
     * @return Client
     */
    public static function get(TestCase $testCase): Client
    {
        /** @var Client|MockObject $client */
        $client = $testCase->getMockBuilder(Client::class)->setConstructorArgs(['http://fake.endpoint'])->getMock();
        $client->method('sendMessage')->willReturnCallback(function (Message $message) {
            self::$message = null;
            self::$message = $message;
        });

        return $client;
    }
}