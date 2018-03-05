<?php
declare(strict_types=1);

namespace NotificationManager\Adapters;

use NotificationManager\Notifications\AbstractMailNotification;
use NotificationManager\Notifications\MailNotificationInterface;
use NotificationManager\Notifications\NotificationInterface;

final class MailAdapter implements AdapterInterface
{
    /** @var \Swift_Mailer */
    private $mailer;

    /**
     * MailAdapter constructor.
     * @param \Swift_Transport $transport
     */
    public function __construct(\Swift_Transport $transport)
    {
        $this->mailer = new \Swift_Mailer($transport);
    }


    /**
     * @param AbstractMailNotification|NotificationInterface $notification
     */
    public function notify(NotificationInterface $notification): void
    {

        if(!$notification instanceof MailNotificationInterface){
            //TODO throw ex
        }

        $message = (new \Swift_Message('Wonderful Subject'))
            ->setFrom(['john@doe.com' => 'John Doe'])
            ->setTo([$notification->getTo()])
            ->setBody($notification->getMessage());

        $this->mailer->send($message);
    }
}