<?php
/**
 *
 * @author j
 * Date: 9/8/15
 * Time: 7:47 PM
 *
 * File: index.php
 */
declare(strict_types=1);

function iWantInts(int $int1, int $int2) {
    return $int1 + $int2;
}

function iWantStrings(string $string) {
    return $string;
}

function iWantBools(bool $bool) {
    return $bool;
}
$closure = function(int $int) {
    return $int;
};

var_dump(iWantBools(true));;
var_dump($closure(12));




