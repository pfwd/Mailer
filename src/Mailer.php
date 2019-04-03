<?php

/**
 * Created by PhpStorm.
 * User: pfwd
 * Date: 05/12/2018
 * Time: 14:48
 */
namespace PFWD\Mailer;

use PFWD\Mailer\Type\EmailTypeInterface;
use Swift_Message;
use Swift_Mailer;

/**
 * Class Mailer
 */
class Mailer {

    /**
     * @var Swift_Mailer
     */
    private $mailer;
    /**
     * @var Config
     */
    private $config;

    /**
     * AbstractMailer constructor.
     *
     * @param Swift_Mailer $mailer
     * @param Config       $config
     */
    public function __construct(Swift_Mailer $mailer, Config $config)
    {
        $this->mailer = $mailer;
        $this->config = $config;
    }

    /**
     * @param EmailTypeInterface $mailerType
     *
     * @return Swift_Message
     */
    public function make(EmailTypeInterface $mailerType): Swift_Message
    {
        $message = (new Swift_Message($mailerType->subject()))
            ->setFrom($this->config->getFromEmail())
            ->setTo($mailerType->to())
            ->setBody($mailerType->body(), $this->config->getContentType())
        ;

        return $message;
    }

    /**
     * @param Swift_Message $message
     *
     * @return Mailer
     */
    public function send(Swift_Message $message): Mailer
    {
        $this->mailer->send($message);

        return $this;
    }

}