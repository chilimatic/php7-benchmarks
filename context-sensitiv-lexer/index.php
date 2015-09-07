<?php
/**
 *
 * @author j
 * Date: 9/3/15
 * Time: 11:53 PM
 *
 * File: index.php
 */

class ContentSensitiveLexer {

    /**
     * the only fatal error would be
     * const class
     */

    /**
     * @var array
     */
    public $list = [];

    const continue = 12;

    const array = 10;
}

$class = new ContentSensitiveLexer();

echo ContentSensitiveLexer::continue;
echo '<br >';
var_dump((new ContentSensitiveLexer())->list);
echo '<br >';
echo ContentSensitiveLexer::array;