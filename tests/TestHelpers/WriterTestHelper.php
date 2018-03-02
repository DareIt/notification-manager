<?php
declare(strict_types=1);

namespace NotificationManager\Tests\TestHelpers;

use NotificationManager\Notifications\NotificationInterface;
use NotificationManager\Writers\WriterInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class WriterTestHelper
{
    /** @var NotificationInterface[] */
    public static $notifications;

    /**
     * @param TestCase $testCase
     * @return WriterInterface
     */
    public static function get(TestCase $testCase): WriterInterface
    {
        self::$notifications = [];

        /** @var MockObject|WriterInterface $writer */
        $writer = $testCase->getMockBuilder(WriterInterface::class)->getMock();
        $writer->method('write')->willReturnCallback(function (NotificationInterface $notification) {
            self::$notifications[] = $notification;
        });

        return $writer;
    }

}