<?php

use Picqer\Barcode\BarcodeGeneratorHTML;

function barcode($data, $widthFactor = 2, $height = 30)
{
    $generatorHTML = new BarcodeGeneratorHTML();
    return $generatorHTML->getBarcode("$data", $generatorHTML::TYPE_CODE_128, $widthFactor, $height);
}
