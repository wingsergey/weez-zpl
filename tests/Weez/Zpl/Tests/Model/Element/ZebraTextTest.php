<?php

namespace Weez\Zpl\Tests\Model\Element;

use PHPUnit\Framework\TestCase;
use Weez\Zpl\Constant\ZebraAlignment;
use Weez\Zpl\Model\Element\ZebraFieldBlock;
use Weez\Zpl\Model\Element\ZebraText;

class ZebraTextTest extends TestCase
{

    public function testGetZplCode(): void
    {
        $text = new ZebraText(20, 20, "Text");
        self::assertEquals("^FT20,20^FH\^FDText^FS\n", $text->getZplCode());
    }

    public function testGetZplCodeWithBlockTest(): void
    {
        $block = new ZebraFieldBlock(500, 2, 1, new ZebraAlignment(ZebraAlignment::RIGHT));
        $text = new ZebraText(20, 20, "Text", null, null, null, $block);
        self::assertEquals("^FT20,20^FB500,2,1,R,^FH\^FDText^FS\n", $text->getZplCode());
    }

    public function testGetZplCodeAllowDecimalTest(): void
    {
        $text = new ZebraText(20, 20, "Text\&Multilined");
        $text->setAllowHexadecimal(false);

        self::assertFalse($text->isAllowHexadecimal());
        self::assertEquals("^FT20,20^FDText\&Multilined^FS\n", $text->getZplCode());
    }
}
