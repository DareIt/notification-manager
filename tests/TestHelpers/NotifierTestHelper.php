<?php
declare(strict_types=1);

namespace NotificationManager\Tests\TestHelpers;

use NotificationManager\Notifications\NotificationInterface;
use NotificationManager\Adapters\AdapterInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class NotifierTestHelper
{
    /** @var NotificationInterface[] */
    public static $notifications;

    /**
     * @param TestCase $testCase
     * @return AdapterInterface
     */
    public static function get(TestCase $testCase): AdapterInterface
    {
        self::$notifications = [];

        /** @var MockObject|AdapterInterface $writer */
        $writer = $testCase->getMockBuilder(AdapterInterface::class)->getMock();
        $writer->method('notify')->willReturnCallback(function (NotificationInterface $notification) {
            self::$notifications[] = $notification;
        });

        return $writer;
    }
}