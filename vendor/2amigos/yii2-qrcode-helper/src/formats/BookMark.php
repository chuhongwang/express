<?php
namespace lulubin\qrcode\formats;

use lulubin\qrcode\traits\UrlTrait;
use yii\base\InvalidConfigException;

class BookMark extends FormatAbstract
{
    use UrlTrait;

    /**
     * @var string bookmark title
     */
    public $title;

    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        if ($this->url === null) {
            throw new InvalidConfigException("'url' cannot be empty.");
        }
    }

    /**
     * @inheritdoc
     */
    public function getText()
    {
        return "MEBKM:TITLE:{$this->title};URL:{$this->url};;";
    }
}