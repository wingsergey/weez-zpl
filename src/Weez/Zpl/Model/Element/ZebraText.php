<?php

namespace Weez\Zpl\Model\Element;

use Weez\Zpl\Constant\ZebraFont;
use Weez\Zpl\Constant\ZebraRotation;
use Weez\Zpl\Model\PrinterOptions;
use Weez\Zpl\Model\ZebraElement;
use Weez\Zpl\Utils\ZplUtils;

/**
 * Zebra element to add Text to specified position.
 *
 *
 */
class ZebraText extends ZebraElement
{
    /**
     *
     * @var ZebraFont|null
     */
    protected $zebraFont;

    /**
     * Explain Font Size (11,13,14).
     * Not in dots.
     *
     * @var float|null
     */
    protected $fontSize;

    /**
     *
     * @var ZebraRotation
     */
    protected $zebraRotation;

    /**
     * @var ZebraFieldBlock|null
     */
    protected $fieldBlock;

    /**
     *
     * @var string
     */
    protected $text;

    /**
     * @var bool
     */
    protected $allowHexadecimal;

    /**
     * @var PrinterOptions
     */
    protected $printerOptions;

    /**
     *
     * @param float $positionX
     * @param float $positionY
     * @param string $text
     * @param float|null $fontSize
     * @param ZebraFont|null $zebraFont
     * @param ZebraRotation|null $zebraRotation
     * @param ZebraFieldBlock|null $fieldBlock
     */
    public function __construct($positionX, $positionY, $text, $fontSize = null, $zebraFont = null, $zebraRotation = null, $fieldBlock = null)
    {
        $this->zebraFont = $zebraFont;
        $this->fontSize = $fontSize;
        $this->zebraRotation = $zebraRotation ?: new ZebraRotation(ZebraRotation::NORMAL);
        $this->text = $text;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->fieldBlock = $fieldBlock;
        $this->printerOptions = new PrinterOptions();
        $this->allowHexadecimal = true;
    }

    /**
     * @return bool
     */
    public function isAllowHexadecimal(): bool
    {
        return $this->allowHexadecimal;
    }

    /**
     * @param bool $allowHexadecimal
     * @return self
     */
    public function setAllowHexadecimal(bool $allowHexadecimal)
    {
        $this->allowHexadecimal = $allowHexadecimal;
        return $this;
    }

    /**
     *
     *  {@inheritdoc}
     */
    public function getZplCode($_printerOptions = null)
    {
        $printerOptions = $_printerOptions ?: $this->printerOptions;
        $zpl = '';
        $zpl .= $this->getZplCodePosition();

        if (!is_null($this->fontSize) && !is_null($this->zebraFont)) {
            //This element has specified size and font
            $dimension = ZplUtils::extractDotsFromFont($this->zebraFont, $this->fontSize, $printerOptions->getZebraPPP());
            $zpl .= ZplUtils::zplCommand("A", [$this->zebraFont->getLetter() . $this->zebraRotation->getLetter(), $dimension[0], $dimension[1]]);
        } elseif (!is_null($this->fontSize) && !is_null($printerOptions->getDefaultZebraFont())) {
            //This element has specified size, but with default font
            $dimension = ZplUtils::extractDotsFromFont($printerOptions->getDefaultZebraFont(), $this->fontSize, $printerOptions->getZebraPPP());
            $zpl .= ZplUtils::zplCommand("A", [$printerOptions->getDefaultZebraFont()->getLetter() . $this->zebraRotation->getLetter(), $dimension[0], $dimension[1]]);
        }

        if ($this->fieldBlock) {
            $zpl .= $this->fieldBlock->getZplCode($printerOptions);
        }

        if ($this->allowHexadecimal) {
            $zpl .= "^FH\\";
        }

        $zpl .= "^FD"; //We allow hexadecimal and start element
        $zpl .= ZplUtils::convertAccentToZplAsciiHexa($this->text);
        $zpl .= ZplUtils::zplCommandSautLigne("FS");

        return $zpl;
    }
}
