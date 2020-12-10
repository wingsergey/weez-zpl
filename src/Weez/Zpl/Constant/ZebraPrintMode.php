<?php

namespace Weez\Zpl\Constant;

/**
 *
 * @author teddy
 */
class ZebraPrintMode
{

    public const TEAR_OFF = "T";
    public const REWIND = "R";
    public const PEEL_OFF_SELECT = true;
    public const PEEL_OFF_NOSELECT = false;
    public const CUTTER = "C";

    //TEAR_OFF("T"), REWIND("R"), PEEL_OFF_SELECT("P", true), PEEL_OFF_NOSELECT("P", false), CUTTER("C");
    /**
     * @var string
     */
    private $desiredMode;

    /**
     * @var string|null
     */
    private $prePeelSelect = '';

    /**
     *
     * @param string $desiredMode
     * @param string|null $prePeelSelectB
     */
    public function __construct($desiredMode, $prePeelSelectB = null)
    {
        $this->desiredMode = $desiredMode;
        if (!is_null($prePeelSelectB)) {
            if ($prePeelSelectB) {
                $this->prePeelSelect = ",Y";
            } else {
                $this->prePeelSelect = ",N";
            }
        }
    }

    /**
     * @return string
     */
    public function getDesiredMode()
    {
        return $this->desiredMode;
    }

    /**
     * @return string|null
     */
    public function getPrePeelSelect()
    {
        return $this->prePeelSelect;
    }

    /**
     * Function which return ^MM command
     *
     * @return string
     */
    public function getZplCode()
    {
        $zpl = "^MM" . $this->desiredMode . $this->prePeelSelect . PHP_EOL;
        return $zpl;
    }
}
