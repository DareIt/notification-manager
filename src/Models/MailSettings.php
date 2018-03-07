<?php
declare(strict_types=1);

namespace DareIt\NotificationManager\Models;

final class MailSettings
{
    /** @var string */
    private $subject;

    /** @var string */
    private $fromName;

    /** @var string */
    private $fromEmail;

    /** @var string|null */
    private $cc;

    /** @var string|null */
    private $bcc;

    /**
     * MailSettings constructor.
     * @param string $subject
     * @param string $fromName
     * @param string $fromEmail
     */
    public function __construct(string $subject, string $fromName, string $fromEmail)
    {
        $this->subject = $subject;
        $this->fromName = $fromName;
        $this->fromEmail = $fromEmail;
    }

    /**
     * @param string $cc
     */
    public function setCc(string $cc): void
    {
        $this->cc = $cc;
    }

    /**
     * @param string $bcc
     */
    public function setBcc(string $bcc): void
    {
        $this->bcc = $bcc;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getFromName(): string
    {
        return $this->fromName;
    }

    /**
     * @return string
     */
    public function getFromEmail(): string
    {
        return $this->fromEmail;
    }

    /**
     * @return null|string
     */
    public function getCc(): ?string
    {
        return $this->cc;
    }

    /**
     * @return null|string
     */
    public function getBcc(): ?string
    {
        return $this->bcc;
    }
}