<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Tests\TestHelpers;

use DareIt\NotificationManager\Adapters\MailAdapter;
use DareIt\NotificationManager\Handlers\HandlerInterface;
use DareIt\NotificationManager\Handlers\MailHandlerInterface;
use DareIt\NotificationManager\Notifications\MailNotificationInterface;
use DareIt\NotificationManager\Notifications\NotificationInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class HandlerTestHelper
{

    /** @var NotificationInterface */
    public static $handledNotification;

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

            $writer = AdapterTestHelper::get($testCase);
            $writer->notify($notification);

            self::$handledNotification = null;
            self::$handledNotification = $notification;
        });

        return $handler;
    }

    /**
     * @param TestCase $testCase
     * @return MailHandlerInterface
     */
    public static function getMail(TestCase $testCase): MailHandlerInterface
    {
        /** @var MockObject|MailHandlerInterface $mailHandler */
        $mailHandler = $testCase->getMockBuilder(MailHandlerInterface::class)->getMock();
        $mailHandler->method('handle')->willReturnCallback(function (MailNotificationInterface $mailNotification)use ($testCase) {

            $writer = new MailAdapter(AdapterTestHelper::getMailClient($testCase));
            $writer->notify($mailNotification);

            self::$handledNotification = null;
            self::$handledNotification = $mailNotification;

        });

        return $mailHandler;
    }
}