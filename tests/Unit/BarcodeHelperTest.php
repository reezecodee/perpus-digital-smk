<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class BarcodeHelperTest extends TestCase
{
    /** @test */
    public function it_generates_barcode_html()
    {
        // Arrange
        $data = '123456789';
        $widthFactor = 2;
        $height = 30;

        // Act
        $html = barcode($data, $widthFactor, $height);

        // Assert
        $this->assertIsString($html);
        $this->assertStringContainsString('<div', $html); // Barcode HTML pakai <div>
        $this->assertStringContainsString('position:absolute;', $html); // Ciri khas barcode
        $this->assertStringContainsString('background-color:black;', $html); // Garis barcode
    }
}
