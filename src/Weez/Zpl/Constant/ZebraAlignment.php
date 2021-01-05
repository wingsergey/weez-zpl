<?php

namespace Weez\Zpl\Constant;

/**
 *
 * @author stephandesouza
 */
class ZebraAlignment
{

    public const LEFT = "L";
    public const CENTER = "C";
    public const RIGHT = "R";
    public const JUSTIFIED = "J";

    /**
     * @var string
     */
    private $alignment;

    /**
     *
     * @param string $alignment
     */
    public function __construct($alignment)
    {
        $this->alignment = $alignment;
    }

    /**
     * @return string
     */
    public function getAlignment()
    {
        return $this->alignment;
    }
}
