<?php
declare(strict_types=1);

namespace NotificationManager\Tests\Adapters;

use NotificationManager\Adapters\MailAdapter;
use NotificationManager\Tests\TestHelpers\AdapterTestHelper;
use NotificationManager\Tests\TestHelpers\NotificationTestHelper;
use PHPUnit\Framework\TestCase;

final class MailAdapterTest extends TestCase
{

    /**
     * @test
     */
    public function canSendNotificationByMailAdapter()
    {
        $mailAdapter = new MailAdapter(AdapterTestHelper::getMailClient($this));
        $mailNotification = NotificationTestHelper::getMail($this);
        $mailAdapter->notify($mailNotification);
        $this->assertCount(1, AdapterTestHelper::$notifications);
    }
}