<?php
namespace lulubin\qrcode\formats;

use lulubin\qrcode\traits\EmailTrait;

class MailTo extends FormatAbstract
{
    use EmailTrait;

    /**
     * @inheritdoc
     */
    public function getText()
    {
        return "MAILTO:{$this->email}";
    }
}