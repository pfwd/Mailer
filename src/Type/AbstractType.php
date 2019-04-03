<?php
/**
 * Created by PhpStorm.
 * User: pfwd
 * Date: 05/12/2018
 * Time: 20:00
 */
namespace PFWD\Mailer\Type;

use Exception;
use PFWD\Mailer\EmailableInterface;

/**
 * Class AbstractType
 */
class AbstractType {

    /**
     * @var EmailableInterface
     */
    protected $recipient;

    /**
     * @param EmailableInterface $recipient
     *
     * @return AbstractType
     */
    public function setRecipient(EmailableInterface $recipient): AbstractType
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * @return string
     *
     * @throws Exception
     */
    public function to(): string
    {
        if(!$this->recipient instanceof EmailableInterface) {
            throw new Exception('Please set a person');
        }

        $email = $this->recipient->getEmail();
        if(empty($email)) {
            throw new Exception('Email address is required');
        }

        return $email;
    }

}