<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Tests\TestHelpers;

use DareIt\NotificationManager\Notifications\NotificationInterface;
use DareIt\NotificationManager\Adapters\AdapterInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class AdapterTestHelper
{
    /** @var array */
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

    /**
     * @param TestCase $testCase
     * @return \Swift_Transport
     */
    public static function getMailClient(TestCase $testCase): \Swift_Transport
    {
        self::$notifications = [];

        /** @var MockObject|\Swift_Transport $transport */
        $transport = $testCase->getMockBuilder(\Swift_Transport::class)->getMock();

        $transport->method('send')->willReturnCallback(function (\Swift_Mime_SimpleMessage $message){
            self::$notifications[] = $message;
        });

        return $transport;

    }
}