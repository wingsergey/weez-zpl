<?php

namespace Weez\Zpl\Constant;

/**
 *
 * @author teddy
 */
class ZebraFont
{

    public const ZEBRA_ZERO = 0;
    public const ZEBRA_A = "A";
    public const ZEBRA_B = "B";
    public const ZEBRA_C = "C";
    public const ZEBRA_D = "D";
    public const ZEBRA_F = "F";
    public const ZEBRA_G = "G";

    /**
     * @var int|string
     */
    private $letter;

    /**
     *
     * @param int|string  $letter
     */
    public function __construct($letter)
    {
        $this->letter = $letter;
    }

    /**
     *
     * @return int|string
     */
    public function getLetter()
    {
        return $this->letter;
    }
}
