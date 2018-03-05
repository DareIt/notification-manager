<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Tests\TestHelpers;

use DareIt\NotificationManager\Notifications\AbstractMailNotification;
use DareIt\NotificationManager\Notifications\AbstractSlackNotification;
use DareIt\NotificationManager\Notifications\MailNotificationInterface;
use DareIt\NotificationManager\Notifications\NotificationInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class NotificationTestHelper
{

    /**
     * @param TestCase $testCase
     * @param array    $testData
     * @return NotificationInterface
     */
    public static function get(TestCase $testCase, array $testData): NotificationInterface
    {
        /** @var MockObject|NotificationInterface $notification */
        $notification = $testCase->getMockBuilder(NotificationInterface::class)->getMock();

        foreach ($testData as $key => $value) {
            if (is_string($key) && is_string($value)) {
                $notification->$key = $value;
            }
        }

        return $notification;
    }

    /**
     * @param TestCase $testCase
     * @return AbstractSlackNotification
     */
    public static function getSlack(TestCase $testCase): AbstractSlackNotification
    {
        /** @var MockObject|AbstractSlackNotification $notification */
        $notification = $testCase->getMockBuilder(AbstractSlackNotification::class)->setConstructorArgs(['foo', 'bar'])->getMockForAbstractClass();

        return $notification;
    }

    /**
     * @param TestCase $testCase
     * @return MailNotificationInterface
     */
    public static function getMail(TestCase $testCase): MailNotificationInterface
    {
        /** @var MockObject|AbstractMailNotification $mailNotification */
        $mailNotification = $testCase->getMockBuilder(AbstractMailNotification::class)->setConstructorArgs(['receiver@domain.org', 'Here is the message itself'])->getMockForAbstractClass();

        return $mailNotification;
    }

}