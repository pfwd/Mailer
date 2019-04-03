<?php
/**
 * Created by PhpStorm.
 * User: pfwd
 * Date: 05/12/2018
 * Time: 20:00
 */

namespace PFWD\Mailer;

use Exception;
use PFWD\Mailer\Type\EmailTypeInterface;

/**
 * Class Factory
 */
class Factory
{
    /**
     * @var array
     */
    private $types = [];

    /**
     * @var EmailableInterface
     */
    private $recipient;

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * Factory constructor.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param EmailableInterface $recipient
     */
    public function setRecipient(EmailableInterface $recipient)
    {
        $this->recipient = $recipient;
    }

    public function setAdaptor()
    {

    }

    /**
     * @param string $type
     *
     * @return EmailTypeInterface
     *
     * @throws Exception
     */
    public function make(string $type):EmailTypeInterface
    {
        if(!isset($this->types[$type])) {
            $emailType = new $type;
            if(!$emailType instanceof EmailTypeInterface){
                throw new Exception('Cannot load email type');
            }

            $emailType->setRecipient($this->recipient);
            $this->types[$type] = $emailType;
        }

        return $this->types[$type];
    }

    /**
     * @param string $type
     *
     * @return Factory
     *
     * @throws Exception
     */
    public function send(string $type): Factory
    {
        $type = $this->make($type);
        $message = $this->mailer->make($type);
        $this->mailer->send($message);

        return $this;
    }
}