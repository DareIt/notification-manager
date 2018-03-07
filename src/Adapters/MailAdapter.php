<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Adapters;

use DareIt\NotificationManager\Exceptions\WrongNotificationInterfaceException;
use DareIt\NotificationManager\Models\MailSettings;
use DareIt\NotificationManager\Notifications\AbstractMailNotification;
use DareIt\NotificationManager\Notifications\MailNotificationInterface;
use DareIt\NotificationManager\Notifications\NotificationInterface;

final class MailAdapter implements AdapterInterface
{
    /** @var \Swift_Mailer */
    private $mailer;

    /** @var MailSettings */
    private $mailSettings;

    /**
     * MailAdapter constructor.
     * @param \Swift_Transport $transport
     * @param MailSettings     $mailSettings
     */
    public function __construct(\Swift_Transport $transport, MailSettings $mailSettings)
    {
        $this->mailer = new \Swift_Mailer($transport);
        $this->mailSettings = $mailSettings;
    }

    /**
     * @param AbstractMailNotification|NotificationInterface $notification
     * @throws WrongNotificationInterfaceException
     */
    public function notify(NotificationInterface $notification): void
    {
        if (!$notification instanceof MailNotificationInterface) {
            throw new WrongNotificationInterfaceException(get_class($notification));
        }

        $message = (new \Swift_Message($this->mailSettings->getSubject()))
            ->setFrom([$this->mailSettings->getFromEmail() => $this->mailSettings->getFromName()])
            ->setTo([$notification->getTo()])
            ->setBody($notification->getMessage());

        if ($this->mailSettings->getCc() !== null) {
            $message->setCc($this->mailSettings->getCc());
        }

        if ($this->mailSettings->getBcc() !== null) {
            $message->setBcc($this->mailSettings->getBcc());
        }

        $this->mailer->send($message);
    }
}