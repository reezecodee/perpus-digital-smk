<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CurrencyHelperTest extends TestCase
{
    /** @test */
    public function it_formats_number_to_rupiah()
    {
        $this->assertEquals('Rp 1.000', formatRupiah(1000));
        $this->assertEquals('Rp 12.345.678', formatRupiah(12345678));
        $this->assertEquals('Rp 0', formatRupiah(0));
        $this->assertEquals('Rp -1.000', formatRupiah(-1000));
        $this->assertEquals('Rp 1.235', formatRupiah(1234.56));
    }
}
