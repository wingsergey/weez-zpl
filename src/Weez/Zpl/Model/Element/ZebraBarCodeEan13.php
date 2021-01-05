<?php

namespace Weez\Zpl\Model\Element;

use Weez\Zpl\Utils\ZplUtils;

/**
 * Element to create a bar code EAN 13
 *
 * Zpl command : ^BE
 *
 * @author stephandesouza
 *
 */
class ZebraBarCodeEan13 extends ZebraBarCode
{

    /**
     *
     * @param float $positionX left margin (explain in dots)
     * @param float $positionY top margin (explain in dots)
     * @param string $text code to write
     * @param float|null $barCodeHeigth height of code bar
     * @param float|null $barCodeWidth width of code bar
     * @param int|null $wideBarRatio
     * @param boolean $showTextInterpretation true to print interpretation line
     * @param boolean $showTextInterpretationAbove true to add above, false to add below
     */
    public function __construct($positionX, $positionY, $text, $barCodeHeigth, $barCodeWidth, $wideBarRatio = null, $showTextInterpretation = false, $showTextInterpretationAbove = false)
    {
        parent::__construct($positionX, $positionY, $text, $barCodeHeigth, $barCodeWidth, $showTextInterpretation, $showTextInterpretationAbove, $wideBarRatio);
    }

    /**
     *  {@inheritdoc}
     */
    public function getZplCode($printerOptions = null)
    {
        $zpl = $this->getStartZplCodeBuilder();
        $zpl .= ZplUtils::zplCommandSautLigne("BE", [
            $this->zebraRotation->getLetter(),
            $this->barCodeHeigth,
            $this->showTextInterpretation,
            $this->showTextInterpretationAbove
        ]);
        $zpl .= "^FD";
        $zpl .= $this->text;
        $zpl .= ZplUtils::zplCommandSautLigne("FS");
        return $zpl;
    }
}
