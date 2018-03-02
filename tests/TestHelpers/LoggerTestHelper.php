<?php
declare(strict_types=1);

namespace NotificationManager\Tests\TestHelpers;

use Monolog\Handler\TestHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

final class LoggerTestHelper
{
    /** @var TestHandler */
    public static $logHandler;

    /**
     * @return LoggerInterface
     */
    public static function get(): LoggerInterface
    {
        self::$logHandler = new TestHandler();
        $logger = new Logger('test', [$handler = self::$logHandler]);

        return $logger;
    }

}