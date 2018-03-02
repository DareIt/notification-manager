<?php
declare(strict_types=1);

namespace NotificationManager\Tests\TestHelpers;

use NotificationManager\Notifications\AbstractSlackNotification;
use NotificationManager\Notifications\NotificationInterface;
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

}