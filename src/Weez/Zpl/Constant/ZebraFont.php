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

    public const FONT_SHIFTS = [
        self::ZEBRA_ZERO => [
            0 => [10, +1], // +1
            1 => [10, +1], // +1
        ],
        self::ZEBRA_A => [
            0 => [14, +9], // +9
            1 => [8, +5], // +5
        ],
        self::ZEBRA_B => [
            0 => [17, +11], // +11
            1 => [11, +7], // +7
        ],
        self::ZEBRA_C => [
            0 => [27, +18], // +18
            1 => [15, +10], // +10
        ],
        self::ZEBRA_D => [
            0 => [27, +18], // +18
            1 => [15, +10], // +10
        ],
        self::ZEBRA_F => [
            0 => [39, +26], // +26
            1 => [20, +13], // +13
        ],
        self::ZEBRA_G => [
            0 => [90, +60], // +60
            1 => [60, +40], // +40
        ],
    ];

    const FONT_SIZE_MM_PER_POINT = 0.353;

    public static function getFontProportions($font)
    {
        $heightShift = ZebraFont::FONT_SHIFTS[$font][0][0];
        $widthShift = ZebraFont::FONT_SHIFTS[$font][1][0];
        $proportion = $widthShift / $heightShift;

        return $proportion;
    }

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
