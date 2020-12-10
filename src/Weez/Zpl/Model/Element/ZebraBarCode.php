<?php

namespace Weez\Zpl\Model\Element;

use Weez\Zpl\Constant\ZebraRotation;
use Weez\Zpl\Model\ZebraElement;
use Weez\Zpl\Utils\ZplUtils;

/**
 * Abstract Zebra element to represent a bar code instruction
 *
 * Command ZPL : All instruction starting ^B
 *
 */
abstract class ZebraBarCode extends ZebraElement
{

    /**
     *
     * @var float|null
     */
    protected $barCodeHeigth;

    /**
     *
     * @var float|null
     */
    protected $moduleWidth;

    /**
     *
     * @var int|null
     */
    protected $wideBarRatio;

    /**
     *
     * @var ZebraRotation
     */
    protected $zebraRotation;

    /**
     *
     * @var boolean
     */
    protected $showTextInterpretation = true;

    /**
     * Parameters to set to true if you want textInterpretation above code (top)
     *
     * @var boolean
     */
    protected $showTextInterpretationAbove = false;

    /**
     *
     * @var string
     */
    protected $text;

    /**
     * Constructeur used to print text (above or below) with code
     *
     * @param float $positionX left margin (explain in dots)
     * @param float $positionY top margin (explain in dots)
     * @param string $text code to write
     * @param float|null $barCodeHeigth height of code bar
     * @param float|null $barCodeWidth width of code bar
     * @param boolean $showTextInterpretation true to print interpretation line
     * @param boolean $showTextInterpretationAbove true to add above, false to add below
     * @param int|null $wideBarRatio
     */
    public function __construct($positionX, $positionY, $text, $barCodeHeigth = null, $barCodeWidth = null, $showTextInterpretation = false, $showTextInterpretationAbove = false, $wideBarRatio = null)
    {
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->barCodeHeigth = $barCodeHeigth;
        $this->moduleWidth = $barCodeWidth;
        $this->wideBarRatio = $wideBarRatio;
        $this->text = $text;
        $this->showTextInterpretation = $showTextInterpretation;
        $this->showTextInterpretationAbove = $showTextInterpretationAbove;
        $this->zebraRotation = new ZebraRotation(ZebraRotation::NORMAL);
    }

    /**
     *
     * @return string
     */
    public function getStartZplCodeBuilder()
    {
        $zpl = '';
        $zpl .= $this->getZplCodePosition();
        $zpl .= "\n";
        if ($this->moduleWidth !== null) {
            $zpl .= ZplUtils::zplCommandSautLigne("BY", [
                $this->moduleWidth,
                $this->wideBarRatio,
                $this->barCodeHeigth
            ]);
        }
        return $zpl;
    }

    /**
     *
     * @return float|null
     */
    public function getBarCodeWidth()
    {
        return $this->moduleWidth;
    }

    /**
     *
     * @return float|null
     */
    public function getBarCodeHeigth()
    {
        return $this->barCodeHeigth;
    }

    /**
     *
     * @return float|null
     */
    public function getWideBarRatio()
    {
        return $this->wideBarRatio;
    }

    /**
     *
     * @return ZebraRotation
     */
    public function getZebraRotation()
    {
        return $this->zebraRotation;
    }

    /**
     *
     * @return boolean
     */
    public function isShowTextInterpretation()
    {
        return $this->showTextInterpretation;
    }

    /**
     *
     * @return boolean
     */
    public function isShowTextInterpretationAbove()
    {
        return $this->showTextInterpretationAbove;
    }

    /**
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     *
     * @param float $barCodeWidth
     * @return self
     */
    public function setBarCodeWidth($barCodeWidth)
    {
        $this->moduleWidth = $barCodeWidth;
        return $this;
    }

    /**
     *
     * @param float $barCodeHeigth
     * @return self
     */
    public function setBarCodeHeigth($barCodeHeigth)
    {
        $this->barCodeHeigth = $barCodeHeigth;
        return $this;
    }

    /**
     *
     * @param int $wideBarRatio
     * @return self
     */
    public function setWideBarRatio($wideBarRatio)
    {
        $this->wideBarRatio = $wideBarRatio;
        return $this;
    }

    /**
     *
     * @param ZebraRotation $zebraRotation
     * @return self
     */
    public function setZebraRotation($zebraRotation)
    {
        $this->zebraRotation = $zebraRotation;
        return $this;
    }

    /**
     *
     * @param boolean $showTextInterpretation
     * @return self
     */
    public function setShowTextInterpretation($showTextInterpretation)
    {
        $this->showTextInterpretation = $showTextInterpretation;
        return $this;
    }

    /**
     *
     * @param boolean $showTextInterpretationAbove
     * @return self
     */
    public function setShowTextInterpretationAbove($showTextInterpretationAbove)
    {
        $this->showTextInterpretationAbove = $showTextInterpretationAbove;
        return $this;
    }

    /**
     *
     * @param string $text
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

}
