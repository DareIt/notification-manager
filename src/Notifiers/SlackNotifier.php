<?php
declare(strict_types=1);

namespace NotificationManager\Notifiers;

use Maknz\Slack\Client;
use Maknz\Slack\Message;
use NotificationManager\Notifications\AbstractSlackNotification;
use NotificationManager\Notifications\NotificationInterface;

final class SlackNotifier implements NotifierInterface
{
    /** @var Client */
    private $slackClient;

    /**
     * SlackNotifier constructor.
     * @param Client $slackClient
     */
    public function __construct(Client $slackClient)
    {
        $this->slackClient = $slackClient;
    }

    /**
     * @param NotificationInterface $notification
     */
    public function notify(NotificationInterface $notification): void
    {
        if ($notification instanceof AbstractSlackNotification) {
            $message = new Message($this->slackClient);
            $message->to($notification->getTo());
            $message->setText($notification->getMessage());
            if ($notification->getAttachmentArray() !== null) {
                $message->attach($notification->getAttachmentArray());
            }
            $this->slackClient->sendMessage($message);
        }
    }
}