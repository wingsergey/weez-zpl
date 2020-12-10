<?php

namespace Weez\Zpl\Tests\Model\Element;

use PHPUnit\Framework\TestCase;
use Weez\Zpl\Model\Element\ZebraBarCode39;

/**
 * Element to create a bar code 128
 *
 * Zpl command : ^BC
 *
 * @author matthiasvets
 *
 */
class ZebraBarCode39Test extends TestCase
{
    public function testZplOutput()
    {
        $barcode = new ZebraBarCode39(10, 297, "CA201212AA", 118, 2, 2);
        self::assertEquals("^FT10,297\n^BY2,2,118\n^B3N,118,N,N,N\n^FDCA201212AA^FS\n", $barcode->getZplCode());
    }
}
