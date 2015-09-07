<?php
/**
 *
 * @author j
 * Date: 9/4/15
 * Time: 12:29 AM
 *
 * File: index.php
 */

/**
 * Crypt FTW !!! :D for all of us who had to implement our own random string generator :D
 */

$randomByteStr = random_bytes($length = 16);
$randomInt = random_int($min = 0, $max = 100000);

echo $randomByteStr . '<br />';
echo $randomInt . '<br />';

$sameNumber = false;

/**
 * set to 999999 to show what happens with bigger numbers
 */
for ($i = 0; $i < 100000; $i++ ) {
    if ($randomInt == random_int($min = 0, $max = 100000)) {
        $sameNumber = true;
        break;
    }
}
if ($sameNumber) {
    echo $i . '- trys needed';
}
