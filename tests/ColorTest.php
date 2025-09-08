<?php
/**
 * Project Color.
 * File: ColorTest.php
 * User: roomet
 * Date: 3.12.2018 10:37
 */

namespace Progeja\Color\Test;

use Color\Color;
use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{


    public function testFromValidRgb()
    {
        $this->assertInstanceOf(
            Color::class,
            Color::fromRGB(255, 10, 10)
        );
        $this->assertInstanceOf(
            Color::class,
            Color::fromRGB(10, 255, 10)
        );
        $this->assertInstanceOf(
            Color::class,
            Color::fromRGB(10, 10, 255)
        );
    }

    public function testFromInvalidRgbR()
    {
        $this->expectException(\InvalidArgumentException::class);
        Color::fromRGB(1000, 10, 10);
    }

    public function testFromInvalidRgbG()
    {
        $this->expectException(\InvalidArgumentException::class);
        Color::fromRGB(10, 1222, 10);
    }

    public function testFromInvalidRgbB()
    {
        $this->expectException(\InvalidArgumentException::class);
        Color::fromRGB(10, 10, -10);
    }

    public function testFromValidName()
    {
        $this->assertInstanceOf(
            Color::class,
            Color::fromName('green')
        );
    }

    public function testFromInvalidName()
    {
        $this->expectException(\InvalidArgumentException::class);
        Color::fromName('Kreen');
    }

    public function testFromValidHsl()
    {
        $this->assertInstanceOf(
            Color::class,
            Color::fromHSL(10, 99, 10)
        );
    }

    public function testFromValidHslS0()
    {
        $this->assertInstanceOf(
            Color::class,
            Color::fromHSL(10, 0, 10)
        );
    }

    public function testFromInvalidHslH()
    {
        $this->expectException(\InvalidArgumentException::class);
        Color::fromHSL(1000, 0, 10);
    }

    public function testFromInvalidHslS()
    {
        $this->expectException(\InvalidArgumentException::class);
        Color::fromHSL(100, 101, 10);
    }

    public function testFromInvalidHslL()
    {
        $this->expectException(\InvalidArgumentException::class);
        Color::fromHSL(100, 10, -101);
    }

    public function testFromValidHexHash()
    {
        $this->assertInstanceOf(
            Color::class,
            Color::fromHex('#FEC123')
        );
    }

    public function testFromValidHexWithoutHash()
    {
        $this->assertInstanceOf(
            Color::class,
            Color::fromHex('12BABA')
        );
    }

    public function testFromValidHexLen6()
    {
        $this->assertInstanceOf(
            Color::class,
            Color::fromHex('#CAFE01')
        );
    }

    public function testFromValidHexLen3()
    {
        $this->assertInstanceOf(
            Color::class,
            Color::fromHex('#FA5')
        );
    }

    public function testFromInvalidHex()
    {
        $this->expectException(\InvalidArgumentException::class);
        Color::fromHex('#C-DEF1');
    }

    public function testFromValidHSV()
    {
        $this->assertInstanceOf(Color::class, Color::fromHSV(10, 0, 10));
        $this->assertInstanceOf(Color::class, Color::fromHSV(11, 0, 10));
        $this->assertInstanceOf(Color::class, Color::fromHSV(12, 0, 10));
        $this->assertInstanceOf(Color::class, Color::fromHSV(13, 1, 10));
        $this->assertInstanceOf(Color::class, Color::fromHSV(14, 1, 10));
        $this->assertInstanceOf(Color::class, Color::fromHSV(15, 2, 10));
        $this->assertInstanceOf(Color::class, Color::fromHSV(16, 3, 10));
    }

    public function testFromInvalidHsvH()
    {
        $this->expectException(\InvalidArgumentException::class);
        Color::fromHSV(1000, 10, 10);
    }

    public function testFromInvalidHsvS()
    {
        $this->expectException(\InvalidArgumentException::class);
        Color::fromHSV(10, -10, 10);
    }

    public function testFromInvalidHsvV()
    {
        $this->expectException(\InvalidArgumentException::class);
        Color::fromHSV(100, 10, 120);
    }

    public function testGetRGB()
    {
        $color = Color::fromName('LightBlue'); // #AD D8 E6 | 173, 216, 230
        $this->assertEquals(173, $color->R);
        $this->assertEquals(216, $color->G);
        $this->assertEquals(230, $color->B);

    }

    public function testGetRedGreenBlue()
    {
        $color = Color::fromName('LightBlue'); // #AD D8 E6 | 173, 216, 230
        $this->assertEquals(173, $color->Red);
        $this->assertEquals(216, $color->Green);
        $this->assertEquals(230, $color->Blue);
    }

    public function testGetHSL()
    {
        $color = Color::fromName('LightBlue'); // #AD D8 E6 | 173, 216, 230
        $this->assertEquals(194.7, $color->hslH);
        $this->assertEquals(53.27, $color->hslS);
        $this->assertEquals(79.02, $color->hslL);
    }

    public function testGetHSV()
    {
        $color = Color::fromName('LightBlue'); // #AD D8 E6 | 173, 216, 230
        $this->assertEquals(194.7, $color->hsvH);
        $this->assertEquals(24.78, $color->hsvS);
        $this->assertEquals(90.2, $color->hsvV);
    }

    public function testGetColorName()
    {
        $color = Color::fromHex('#ADD8E6');
        $this->assertEquals('LightBlue', $color->name);
    }

    public function testGetColorNoName()
    {
        $color = Color::fromHex('#ADD000');
        $this->assertEquals('', $color->name);
    }

    public function testGetColorHex()
    {
        $color = Color::fromHex('#ADD000');
        $this->assertEquals(['hex' => 'add000', 'web' => '#add000'], $color->HEX);
    }

    public function testGetRGBArray()
    {
        $color = Color::fromHex('#ADD000');
        $this->assertArrayHasKey('R', $color->RGB);
        $this->assertArrayHasKey('red', $color->RGB);
    }

    public function testGetHSLArray()
    {
        $color = Color::fromHex('#ADD000');
        $this->assertArrayHasKey('S', $color->HSL);
        $this->assertArrayHasKey('lightness', $color->HSL);
    }

    public function testGetHSVArray()
    {
        $color = Color::fromHex('#ADD000');
        $this->assertArrayHasKey('V', $color->HSV);
        $this->assertArrayHasKey('saturation', $color->HSV);
    }

    public function testGetColorHex3()
    {
        $color = Color::fromHex('#AA00cc');
        $this->assertArrayHasKey('short-web', $color->HEX);
    }

    public function testGetAllNames()
    {
        $names = Color::getColorNames();
        $this->assertEquals(140, count($names));
    }

    public function testGetPropertyErr()
    {
        $color = Color::fromHex('#AA00cc');
        $this->expectException(\InvalidArgumentException::class);
        $test = $color->Brown;

    }

    public function testSetValueErr()
    {
        $color    = Color::fromName('Cyan');
        $property = 'R';
        $this->expectException(\InvalidArgumentException::class);
        $color->$property = 123;
    }
}
