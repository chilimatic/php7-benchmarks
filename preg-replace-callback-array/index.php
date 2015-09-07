<?php
/**
 *
 * @author j
 * Date: 9/4/15
 * Time: 12:09 AM
 *
 * a little buggy still but hey
 *
 * File: index.php
 */

$callbackPatternArray = [
    '/MyFirstPattern/m' => function($matches) {
        return $matches[0];
    },
    '/^(omgAnotherCallback)/' => function($matches) {
        return 'there has been another hit!';
    },
    '/^(letsTrySomethingDifferent)/' => function($matches) {
        return $matches[0]. '... or not ?';
    },'/(\d+)(\d+)(\d+)(\d+)(\d+)(\d+)/' => function($matches) {
        $string = '';
        foreach ($matches as $toReplace) {
            $string .= '*';
        }

        return $string;
    }
];

echo '<pre>';

$code = preg_replace_callback_array($callbackPatternArray, 'MyFirstPattern');
var_dump($code);
$result = preg_replace_callback_array($callbackPatternArray, 'omgAnotherCallback....OMG!');
var_dump($result);
$result = preg_replace_callback_array($callbackPatternArray, 'letsTrySomethingDifferent....OMG!');
var_dump($result);
$result = preg_replace_callback_array($callbackPatternArray, '123456');
var_dump($result);


echo '</pre>';