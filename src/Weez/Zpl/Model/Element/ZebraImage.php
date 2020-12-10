<?php

namespace Weez\Zpl\Model\Element;

use Weez\Zpl\Exceptions\InvalidZebraImageException;
use Weez\Zpl\Model\ZebraElement;
use Weez\Zpl\Utils\ZplUtils;
use Zebra\Zpl\Image;

/**
 * Zebra element to create image
 *
 * Zpl command :
 *
 * @author matthiasvets
 *
 */
class ZebraImage extends ZebraElement
{

    /**
     * @var Image
     */
    private $resource;

    /**
     * @var string
     */
    private $compression;

    /**
     *
     * @param int $positionX
     * @param int $positionY
     * @param string $path
     * @param string $compression ['A' => Ascii data | 'B'=> Binary data]
     */
    public function __construct($positionX, $positionY, $path, $compression = 'A')
    {
        if (!$image = file_get_contents($path)) {
            throw new InvalidZebraImageException();
        }
        $this->resource = new Image($image);
        $this->compression = $compression;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
    }

    /**
     *
     *  {@inheritdoc}
     */
    public function getZplCode($printerOptions = null)
    {
        $bytesPerRow = $this->resource->width();
        $byteCount = $fieldCount = $bytesPerRow * $this->resource->height();
        $zpl = '';
        $zpl .= $this->getZplCodePosition();
        $zpl .= "\n";
        $zpl .= ZplUtils::zplCommand("GF", [
            $this->compression,
            $byteCount,
            $fieldCount,
            $bytesPerRow,
            $this->resource->toAscii()]);
        $zpl .= "^FS";
        $zpl .= "\n";
        return $zpl;
    }

}
