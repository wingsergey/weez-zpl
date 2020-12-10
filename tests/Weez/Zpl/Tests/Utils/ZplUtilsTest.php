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
class ZplUtilsTest extends TestCase
{

    /**
     * Test with only label without element
     */
    public function testZebraLabelAlone(): void
    {

        self::assertEquals("^XA", ZplUtils::zplCommand("XA"));
        self::assertEquals("^FT5,6", ZplUtils::zplCommand("FT", [5, 6]));
        self::assertEquals("^FT5,,6", ZplUtils::zplCommand("FT", [5, null, 6]));

        self::assertEquals("^XA\n", ZplUtils::zplCommandSautLigne("XA"));
        self::assertEquals("^FT5,6\n", ZplUtils::zplCommandSautLigne("FT", [5, 6]));
        self::assertEquals("^FT5,,6\n", ZplUtils::zplCommandSautLigne("FT", [5, null, 6]));
    }
}
