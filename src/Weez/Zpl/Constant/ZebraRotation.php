<?php

namespace Weez\Zpl\Constant;

/**
 *
 * @author teddy
 */
class ZebraRotation
{

    public const NORMAL = "N";
    public const ROTATE_90 = "R";
    public const INVERTED = "I";
    public const READ_FROM_BOTTOM = "B";

    /**
     * @var string
     */
    private $letter;

    /**
     *
     * @param string $letter
     */
    public function __construct($letter)
    {
        $this->letter = $letter;
    }

    /**
     * @return string
     */
    public function getLetter()
    {
        return $this->letter;
    }
}
