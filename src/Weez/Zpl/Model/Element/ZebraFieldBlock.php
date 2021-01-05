<?php

namespace Weez\Zpl\Model\Element;

use Weez\Zpl\Constant\ZebraAlignment;
use Weez\Zpl\Model\ZebraElement;
use Weez\Zpl\Utils\ZplUtils;

/**
 * Zebra element to add Field Block.
 *
 * @author stephandesouza
 */
class ZebraFieldBlock extends ZebraElement
{

    /**
     * @var float|null
     */
    public $maxWidth;

    /**
     * @var int|null
     */
    public $maxLines;

    /**
     * @var int|null
     */
    public $lineSpacing;

    /**
     * @var ZebraAlignment
     */
    public $alignment;

    /**
     * @var int|null
     */
    public $hangingIndent;

    /**
     * @param float|null $maxWidth
     * @param int|null $maxLines
     * @param int|null $lineSpacing
     * @param ZebraAlignment|null $alignment
     * @param int|null $hangingIndent
     */
    public function __construct($maxWidth, $maxLines = null, $lineSpacing = null, $alignment = null, $hangingIndent = null)
    {
        $this->maxWidth = $maxWidth;
        $this->maxLines = $maxLines;
        $this->lineSpacing = $lineSpacing;
        $this->alignment = $alignment ?: new ZebraAlignment("");
        $this->hangingIndent = $hangingIndent;
    }


    /**
     *
     *  {@inheritdoc}
     */
    public function getZplCode($printerOptions = null)
    {
        $zpl = '';

        $zpl .= ZplUtils::zplCommand("FB", [
            $this->maxWidth,
            $this->maxLines,
            $this->lineSpacing,
            $this->alignment->getAlignment(),
            $this->hangingIndent,
        ]);

        return $zpl;
    }
}
