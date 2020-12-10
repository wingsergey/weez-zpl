<?php

namespace Weez\Zpl\Tests\Model\Element;

use PHPUnit\Framework\TestCase;
use Weez\Zpl\Model\Element\ZebraBarCode128;

/**
 * Element to create a bar code 128
 *
 * Zpl command : ^BC
 *
 * @author matthiasvets
 *
 */
class ZebraBarCode128Test extends TestCase
{
    public function testZplOutput(): void
    {
        $barcode = new ZebraBarCode128(70, 1000, "0235600703875191516022937128", 190, 4, false, false, 2);
        self::assertEquals("^FT70,1000\n^BY4,2,190\n^BCN,190,N,N,N\n^FD0235600703875191516022937128^FS\n", $barcode->getZplCode());
    }
}
