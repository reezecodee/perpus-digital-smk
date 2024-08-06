<?php

if (! function_exists('formatRupiah')) {
    /**
     * Format angka menjadi format mata uang Rupiah.
     *
     * @param  int|float  $number
     * @return string
     */
    
    function formatRupiah($nominal) {
        return  'Rp ' . number_format($nominal, 0, ',', '.');
    }
}