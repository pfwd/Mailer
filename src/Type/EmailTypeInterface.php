<?php
/**
 * Created by PhpStorm.
 * User: pfwd
 * Date: 05/12/2018
 * Time: 20:00
 */
namespace PFWD\Mailer\Type;

use PFWD\Mailer\EmailableInterface;

interface EmailTypeInterface {

    /**
     * @return string
     */
    public function body():string;

    /**
     * @return string
     */
    public function subject():string;

    /**
     * @return string
     */
    public function to():string;

    /**
     * @param EmailableInterface $recipient
     *
     * @return mixed
     */
    public function setRecipient(EmailableInterface $recipient);

}