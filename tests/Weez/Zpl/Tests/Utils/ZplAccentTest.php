<?php

namespace Weez\Zpl\Tests\Utils;

use PHPUnit\Framework\TestCase;
use Weez\Zpl\Utils\ZplUtils;

/**
 * Common method used to manipulate ZPL
 *
 * @author ttropard
 *
 */
class ZplAccentTest extends TestCase
{

    /**
     * Test with only label without element
     */
    public function testZebraLibrary1()
    {
        self::assertEquals("Qt\\82", ZplUtils::convertAccentToZplAsciiHexa("Qté"));
        self::assertEquals("\\85", ZplUtils::convertAccentToZplAsciiHexa("à"));
    }
}
