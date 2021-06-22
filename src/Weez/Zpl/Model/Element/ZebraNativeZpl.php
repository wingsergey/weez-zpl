<?php

namespace Weez\Zpl\Model\Element;

use Weez\Zpl\Model\ZebraElement;

/**
 * Object use if you want add Zpl Code not supported by this library
 *
 */
class ZebraNativeZpl extends ZebraElement
{

    /**
     * @var string
     */
    private $zplCode;

    /**
     * @var bool
     */
    private $defaultDrawGraphic;

    /**
     *
     * @param string $zplCode
     */
    public function __construct($zplCode)
    {
        $this->zplCode = $zplCode;
        $this->defaultDrawGraphic = false;
    }

    /**
     *
     *  {@inheritdoc}
     */
    public function getZplCode($printerOptions = null)
    {
        return $this->zplCode . "\n";
    }
}
