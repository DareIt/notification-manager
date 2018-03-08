<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Exceptions;

final class WrongNotificationInterfaceException extends \Exception
{

    /**
     * WrongNotificationInterfaceException constructor.
     * @param string $notificationClassName
     */
    public function __construct(string $notificationClassName)
    {
        $this->message = sprintf('Notification %s not found ', $notificationClassName);
    }

}