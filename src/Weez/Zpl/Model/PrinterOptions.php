<?php

namespace Weez\Zpl\Model;

use Weez\Zpl\Constant\ZebraFont;
use Weez\Zpl\Constant\ZebraPPP;

/**
 *
 * @author teddy
 */
class PrinterOptions
{

    /**
     * @var ZebraPPP
     */
    private $zebraPPP;

    /**
     * @var ZebraFont|null
     */
    private $defaultZebraFont;

    /**
     * @var float|null
     */
    private $defaultFontSize;

    /**
     *
     * @param ZebraPPP|null $zebraPPP
     */
    public function __construct($zebraPPP = null)
    {
        $this->zebraPPP = $zebraPPP ?: new ZebraPPP(ZebraPPP::DPI_300);
    }

    /**
     * @return ZebraPPP
     */
    public function getZebraPPP()
    {
        return $this->zebraPPP;
    }

    /**
     *
     * @param ZebraPPP $zebraPPP
     * @return self
     */
    public function setZebraPPP($zebraPPP)
    {
        $this->zebraPPP = $zebraPPP;
        return $this;
    }

    /**
     *
     * @return ZebraFont|null
     */
    public function getDefaultZebraFont()
    {
        return $this->defaultZebraFont;
    }

    /**
     *
     * @return float|null
     */
    public function getDefaultFontSize()
    {
        return $this->defaultFontSize;
    }

    /**
     *
     * @param ZebraFont $defaultZebraFont
     * @return self
     */
    public function setDefaultZebraFont($defaultZebraFont)
    {
        $this->defaultZebraFont = $defaultZebraFont;
        return $this;
    }

    /**
     *
     * @param float $defaultFontSize
     * @return \Weez\Zpl\Model\PrinterOptions
     */
    public function setDefaultFontSize($defaultFontSize)
    {
        $this->defaultFontSize = $defaultFontSize;
        return $this;
    }

}
