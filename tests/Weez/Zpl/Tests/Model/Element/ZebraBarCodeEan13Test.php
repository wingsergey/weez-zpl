<?php

namespace Weez\Zpl\Tests\Model\Element;

use PHPUnit\Framework\TestCase;
use Weez\Zpl\Model\Element\ZebraBarCodeEan13;

/**
 * Element to create a bar code EAN 13
 *
 * Zpl command : ^BE
 *
 * @author stephandesouza
 *
 */
class ZebraBarCodeEan13Test extends TestCase
{
    public function testZplOutput(): void
    {
        $barcode = new ZebraBarCodeEan13(10, 297, "5901234123457", 118, 2, 2);
        self::assertEquals("^FT10,297\n^BY2,2,118\n^BEN,118,N,N\n^FD5901234123457^FS\n", $barcode->getZplCode());
    }
}
