<?php
/**
 * Created by PhpStorm.
 * User: pfwd
 * Date: 05/12/2018
 * Time: 20:00
 */
namespace PFWD\Mailer\Type;

/**
 * Class TemplateTypeInterface
 */
class TemplateTypeInterface extends AbstractType implements EmailTypeInterface {

    /**
     * @return string
     */
    public function body(): string
    {
        return "This is a template";
    }

    /**
     * @return string
     */
    public function subject(): string
    {
        return 'This is a template email';
    }


}