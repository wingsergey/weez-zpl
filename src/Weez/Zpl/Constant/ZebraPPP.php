<?php

namespace Weez\Zpl\Constant;

/**
 * Contante used to define printed precision
 *
 * @author teddy
 */
class ZebraPPP
{
    public const DPI_203 = 8;
    public const DPI_300 = 12;
    public const DPI_600 = 23.5;

    /**
     * @var float
     */
    private $dotByMm;

    /**
     *
     * @param float $dotByMm
     */
    public function __construct($dotByMm)
    {
        $this->dotByMm = $dotByMm;
    }

    /**
     * @return float
     */
    public function getDotByMm()
    {
        return $this->dotByMm;
    }
}
