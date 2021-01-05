<?php

namespace Weez\Zpl\Tests\Model\Element;

use PHPUnit\Framework\TestCase;
use Weez\Zpl\Constant\ZebraAlignment;
use Weez\Zpl\Model\Element\ZebraFieldBlock;

/**
 * Zebra element to add Field Block.
 *
 *
 */
class ZebraFieldBlockTest extends TestCase
{

    public function testGetZplCode(): void
    {
        $barcode = new ZebraFieldBlock(500, 2, 10, new ZebraAlignment(ZebraAlignment::CENTER));
        self::assertEquals("^FB500,2,10,C", $barcode->getZplCode());
    }
}
