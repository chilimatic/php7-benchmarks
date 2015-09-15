<?php

require_once('namespace1.php');
require_once('namespace2.php');

/**
 *
 * @author j
 * Date: 9/15/15
 * Time: 9:21 PM
 *
 * File: index.php
 */
use \my\example\{
    ThisIsAVerySpecificLongNameWhichOthersMayJustWouldCallBar as Bar,
    ThisIsAVerySpecificLongNameWhichOthersMayJustWouldCallFoo as Foo
};
use \my\example\{
    const MYNAMESPACECONST as myConst,
    function myLittleGenerator
} ;

echo myConst . '<br />';

$test = new Foo();
$test2 = new Bar();
$test3 = myLittleGenerator();

var_dump($test);
echo "<br />";
var_dump($test2);
echo "<br />";
var_dump($test3);