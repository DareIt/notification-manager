<?php
declare(strict_types=1);

namespace NotificationManager\Adapters;

use NotificationManager\Notifications\NotificationInterface;

final class MailAdapter implements AdapterInterface
{

    /**
     * @param NotificationInterface $notification
     */
    public function notify(NotificationInterface $notification): void
    {
        // TODO: Implement notify() method.
    }
}