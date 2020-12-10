<?php


namespace Weez\Zpl\Tests\Constant;

use PHPUnit\Framework\TestCase;
use Weez\Zpl\Constant\ZebraFont;

/**
 * Description of ZebraFont
 *
 * @author teddy
 */
class ZebraFontTest extends TestCase
{

    public function testConstante(): void
    {
        // Assert
        $this->assertEquals(0, ZebraFont::ZEBRA_ZERO);
    }

}
