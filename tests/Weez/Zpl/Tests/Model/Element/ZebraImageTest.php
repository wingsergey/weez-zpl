<?php

namespace Weez\Zpl\Tests\Model\Element;

use Weez\Zpl\Model\Element\ZebraImage;
use PHPUnit\Framework\TestCase;

class ZebraImageTest extends TestCase
{

    public function testGetZplCodeJpg(): void
    {
        $file = $this->getTestFilesDirectory('test.jpg');
        $image = new ZebraImage(30, 60, $file);
        $ascii = $this->getAsciiFromImageFile($file);
        self::assertEquals("^FT30,60\n^GFA,12040,12040,43,{$ascii}^FS\n", $image->getZplCode());
    }

    public function testGetZplCodePng(): void
    {
        $file = $this->getTestFilesDirectory('test.png');
        $image = new ZebraImage(30, 60, $file);
        $ascii = $this->getAsciiFromImageFile($file);
        self::assertEquals("^FT30,60\n^GFA,19492,19492,44,{$ascii}^FS\n", $image->getZplCode());
    }

    public function getAsciiFromImageFile(string $file): string
    {
        $content = file_get_contents($file . '.ascii');
        if (!$content) {
            throw new \RuntimeException("File not found on path: " . $file);
        }

        return $content;
    }

    public function getTestFilesDirectory(string $suffix = ''): string
    {
        return __DIR__ . '/../../../../../tesfiles' . ($suffix === '' ? '' : '/' . $suffix);
    }
}
