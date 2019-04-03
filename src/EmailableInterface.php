<?php

namespace PFWD\Mailer;

interface EmailableInterface
{
    /**
     * @return string
     */
    public function getEmail(): string;
}