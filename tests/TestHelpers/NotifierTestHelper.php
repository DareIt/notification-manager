<?php
declare(strict_types=1);

namespace NotificationManager\Tests\TestHelpers;

use NotificationManager\Notifications\NotificationInterface;
use NotificationManager\Notifiers\NotifierInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class NotifierTestHelper
{
    /** @var NotificationInterface[] */
    public static $notifications;

    /**
     * @param TestCase $testCase
     * @return NotifierInterface
     */
    public static function get(TestCase $testCase): NotifierInterface
    {
        self::$notifications = [];

        /** @var MockObject|NotifierInterface $writer */
        $writer = $testCase->getMockBuilder(NotifierInterface::class)->getMock();
        $writer->method('notify')->willReturnCallback(function (NotificationInterface $notification) {
            self::$notifications[] = $notification;
        });

        return $writer;
    }
}