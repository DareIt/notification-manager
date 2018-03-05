<?php
declare(strict_types=1);

namespace NotificationManager\Tests\Handlers;

use NotificationManager\Notifications\NotificationInterface;
use NotificationManager\Tests\TestHelpers\HandlerTestHelper;
use NotificationManager\Tests\TestHelpers\NotificationTestHelper;
use PHPUnit\Framework\TestCase;

final class HandlerTest extends TestCase
{

    /**
     * @test
     */
    public function canHandleNotification()
    {
        $notification = NotificationTestHelper::get($this, ['foo' => 'bar']);
        $handler = HandlerTestHelper::get($this);
        $handler->handle($notification);
        $this->assertInstanceOf(NotificationInterface::class,  HandlerTestHelper::$handledNotification);
    }

}