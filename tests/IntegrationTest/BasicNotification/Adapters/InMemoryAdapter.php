<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification\Adapters;

use DareIt\NotificationManager\Adapters\AdapterInterface;
use DareIt\NotificationManager\Notifications\NotificationInterface;

final class InMemoryAdapter implements AdapterInterface
{

    /** @var array */
    public static $notifiedData;

    /** @var string */
    private $arrayKey;

    /**
     * InMemoryAdapter constructor.
     */
    public function __construct()
    {
        self::$notifiedData = [];
    }

    /**
     * @param string $arrayKey
     */
    public function setArrayKey(string $arrayKey): void
    {
        $this->arrayKey = $arrayKey;
    }

    /**
     * @param NotificationInterface $notification
     */
    public function notify(NotificationInterface $notification): void
    {
        self::$notifiedData[$this->arrayKey][] = json_encode((array) $notification);
    }
}