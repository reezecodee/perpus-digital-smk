<?php

namespace Tests\Unit;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class TimeHistoryHelperTest extends TestCase
{
    /** @test */
    public function it_returns_human_readable_difference()
    {
        Carbon::setLocale('id');
        // Set waktu saat ini (dibekukan)
        $now = Carbon::create(2025, 6, 22, 12, 0, 0);
        Carbon::setTestNow($now);

        // Contoh: 2 jam lalu
        $twoHoursAgo = $now->copy()->subHours(2);

        $result = howLongTime($twoHoursAgo);

        $this->assertEquals('2 jam yang lalu', $result);

        // Contoh: 3 hari lalu
        $threeDaysAgo = $now->copy()->subDays(3);
        $result = howLongTime($threeDaysAgo);

        $this->assertEquals('3 hari yang lalu', $result);

        // Reset Carbon test now
        Carbon::setTestNow();
    }
}
