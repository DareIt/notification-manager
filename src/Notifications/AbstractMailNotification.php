<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Notifications;

abstract class AbstractMailNotification implements MailNotificationInterface
{
    /** @var string */
    protected $to;

    /** @var string */
    protected $message;

    /**
     * AbstractMailNotification constructor.
     * @param string $to
     * @param string $message
     */
    public function __construct(string $to, string $message)
    {
        $this->to = $to;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}