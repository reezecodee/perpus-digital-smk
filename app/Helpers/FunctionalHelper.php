<?php

use Carbon\Carbon;

function howLongTime($time){
    $carbonParse = Carbon::parse($time);
    return $carbonParse->diffForHumans();
}
