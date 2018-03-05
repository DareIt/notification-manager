<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Tests\Adapters;

use DareIt\NotificationManager\Adapters\MailAdapter;
use DareIt\NotificationManager\Tests\TestHelpers\AdapterTestHelper;
use DareIt\NotificationManager\Tests\TestHelpers\NotificationTestHelper;
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