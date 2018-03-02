<?php
declare(strict_types=1);

namespace NotificationManager\Notifications;

abstract class AbstractSlackNotification implements SlackNotificationInterface
{
    /** @var string */
    protected $to;

    /** @var string */
    protected $message;

    /** @var array|null */
    protected $attachmentArray;

    /**
     * AbstractSlackNotification constructor.
     * @param string $to
     * @param string $message
     */
    public function __construct(string $to, string $message)
    {
        $this->to = $to;
        $this->message = $message;
    }

    /**
     * @param array $attachmentArray
     */
    public function setAttachmentArray(array $attachmentArray): void
    {
        $this->attachmentArray = $attachmentArray;
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

    /**
     * @return array|null
     */
    public function getAttachmentArray(): ?array
    {
        return $this->attachmentArray;
    }
}