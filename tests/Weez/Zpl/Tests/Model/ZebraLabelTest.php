<?php

namespace Weez\Zpl\Tests\Model;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Weez\Zpl\Constant\ZebraFont;
use Weez\Zpl\Model\Element\ZebraBarCode39;
use Weez\Zpl\Model\Element\ZebraGraficBox;
use Weez\Zpl\Model\Element\ZebraImage;
use Weez\Zpl\Model\Element\ZebraQrCode;
use Weez\Zpl\Model\Element\ZebraText;
use Weez\Zpl\Model\ZebraLabel;

/**
 * Description of ZebraLabel
 *
 * @author teddy
 */
class ZebraLabelTest extends TestCase
{

    /**
     * Test with only label without element
     */
    public function testZebraLabelAlone()
    {
        $zebraLabel = new ZebraLabel();
        self::assertEquals("^XA\n^LH0,0\n^FWN,0\n^PON\n^CF0\n^MMT\n^XZ\n", $zebraLabel->getZplCode());
    }

    /**
     * Test with only label without element
     */
    public function testZebraLabelSize()
    {
        $zebraLabel = new ZebraLabel(500, 760);
        self::assertEquals("^XA\n^LH0,0\n^FWN,0\n^PON\n^CF0\n^MMT\n^PW500\n^LL760\n^XZ\n", $zebraLabel->getZplCode());
    }

    public function testZebraLabelFeatures()
    {

        $faker = Factory::create();
        $fakerImage = $faker->image(null, 150, 150, 'transport', true);
        //Init Label
        $zebraLabel = new ZebraLabel(); //8x3 = 608x1624
        //$zebraLabel->setZebraPrintMode(new ZebraPrintMode(ZebraPrintMode::CUTTER));
        $zebraLabel->setDefaultZebraFont(new ZebraFont(ZebraFont::ZEBRA_ZERO));
        //Add Text element
        $zebraLabel->addElement(new ZebraText(10, 84, "Product:", 14));
        $zebraLabel->addElement(new ZebraText(395, 84, "Camera", 14));

        $zebraLabel->addElement(new ZebraGraficBox(10, 100, 800, 5));

        $zebraLabel->addElement(new ZebraText(10, 161, "CA201212AA", 14));

        //Add Code Bar 39
        $zebraLabel->addElement(new ZebraBarCode39(10, 297, "CA201212AA", 118, 2, 2));

        $zebraLabel->addElement(new ZebraText(10, 365, "Qté:", 11));
        $zebraLabel->addElement(new ZebraText(180, 365, "3", 11));
        $zebraLabel->addElement(new ZebraText(317, 365, "QA", 11));

        $zebraLabel->addElement(new ZebraText(10, 520, "Ref log:", 11));
        $zebraLabel->addElement(new ZebraText(180, 520, "0035", 11));
        $zebraLabel->addElement(new ZebraText(10, 596, "Ref client:", 11));
        $zebraLabel->addElement(new ZebraText(180, 599, "1234", 11));
        //Add Image from Url
        $zebraLabel->addElement(new ZebraImage(350, 850, $fakerImage));
        //Add Qr Code
        $zebraLabel->addElement(new ZebraQrCode(350, 297, 'test'));

        self::assertNotEmpty($zebraLabel->getZplCode());
    }
}
