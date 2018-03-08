<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Tests\IntegrationTest\BasicNotification\Notifications;

final class Basic3Notification implements BasicNotificationInterface
{
    /** @var string */
    private $dataA;

    /** @var string */
    private $dataB;

    /**
     * Basic3Notification constructor.
     * @param string $dataA
     * @param string $dataB
     */
    public function __construct(string $dataA, string $dataB)
    {
        $this->dataA = $dataA;
        $this->dataB = $dataB;
    }

    /**
     * @return string
     */
    public function getDataA(): string
    {
        return $this->dataA;
    }

    /**
     * @return string
     */
    public function getDataB(): string
    {
        return $this->dataB;
    }
}