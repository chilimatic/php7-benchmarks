<?php
/**
 *
 * @author j
 * Date: 9/15/15
 * Time: 9:34 PM
 *
 * File: index.php
 */

$count = 5;
/**
 * this is off by default !!!
 */
ini_set('assert.exception', 1);

try {
    function setResponseCode($code) {
        assert($code < 550 && $code > 100, "Invalid response code provided: {$code}");
        $this->code = $code;
    }
    setResponseCode(600);
} catch (Throwable $e) {
    echo $e->getMessage();
}
