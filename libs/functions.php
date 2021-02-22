<?php

function calculate_age($birthday) {
    $birthday_timestamp = strtotime($birthday);
    $age = date('Y') - date('Y', $birthday_timestamp);
    if (date('md', $birthday_timestamp) > date('md')) {
        $age--;
    }
    $year = abs($age);
    $t1 = $year % 10;
    $t2 = $year % 100;
    return ($t1 == 1 && $t2 != 11 ? $age . " год" : ($t1 >= 2 && $t1 <= 4 && ($t2 < 10 || $t2 >= 20) ? $age . " года" : $age . " лет"));
}
function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}