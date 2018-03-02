<?php
declare(strict_types=1);

namespace NotificationManager\Tests\TestHelpers;

use NotificationManager\Handlers\HandlerInterface;
use NotificationManager\Notifications\NotificationInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class HandlerTestHelper
{

    /**
     * @param TestCase $testCase
     * @return HandlerInterface
     */
    public static function get(TestCase $testCase): HandlerInterface
    {
        /** @var MockObject|HandlerInterface $handler */
        $handler = $testCase->getMockBuilder(HandlerInterface::class)->getMock();
        $handler->method('handle')->willReturnCallback(function (NotificationInterface $notification) use ($testCase
        ): void {

            $writer = NotifierTestHelper::get($testCase);
            $writer->notify($notification);
        });

        return $handler;
    }
}