<?php

/**
 * Created by PhpStorm.
 * User: pfwd
 * Date: 05/12/2018
 * Time: 20:00
 */
namespace PFWD\Mailer;

/**
 * Class Config
 */
class Config {

    /**
     * @var string
     */
    private $fromEmail = '';

    /**
     * @var string
     */
    private $fromName = '';

    /**
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Config constructor.
     *
     * @param string $fromEmail
     * @param string $fromName
     * @param string $contentType
     */
    public function __construct(string $fromEmail, string $fromName = '', string $contentType = 'text/html')
    {
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;
        $this->contentType = $contentType;
    }

    /**
     * @return string
     */
    public function getFromEmail(): string
    {
        return $this->fromEmail;
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
    public function getContentType()
    {
        return $this->contentType;
    }


}