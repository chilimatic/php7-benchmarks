<?php
/**
 *
 * @author j
 * Date: 9/4/15
 * Time: 12:29 AM
 *
 * File: index.php
 */

declare(strict_types=1);

/**
 * @param int $min
 * @param int $max
 * @param int $retries
 */
function cryptRangeIntTest(int $min, int $max, int $retries) : array
{
    $randomInt = random_int($min, $max);
    $sameNumber = false;

    for ($i = 0; $i < $retries; $i++ ) {
        if ($randomInt == random_int($min, $max)) {
            $sameNumber = true;
            break;
        }
    }
    $amountOfTries = '';
    if ($sameNumber) {
        $amountOfTries = $i . '- trys needed';
    }

    return [
        $randomInt,
        $amountOfTries
    ];

}

/**
 * @param int $length
 * @param int $tries
 */
function cryptRangeStringTest(int $length, int $tries) : array
{
    $randomByteStr = random_bytes($length);
    $sameString = false;

    for ($i = 0; $i < $tries; $i++ ) {
        if ($randomByteStr == random_bytes($length)) {
            $sameString = true;
            break;
        }
    }

    $amountOfTries = 'not repeated with ' . $i . 'tries';
    if ($sameString) {
        $amountOfTries = $i . '- trys needed';
    }

    return [
        $randomByteStr,
        $amountOfTries
    ];
}

?>
<html>
    <head>
        <title>Random generators CSPRNG</title>
    </head>
    <body>
        <h1>Random generators crypt improvements :D</h1>
        <p>
            possible integers with base 10 is ofc n times 10 <br >
            which means if we got the range of 1-10 we have 2 positions<br />
            10^2 possibilities. 100 possible combinations
        </p>

        <p>
            so if we just would take the common arabic letters a-z we would already have 26^1 without the <br />
            uppercase. so lets just asume 52^1 possibilities for the first character. <br />
            And we will see how much faster the random bytestring increases the complexity in comparison to <br />
            the number
        </p>

        <h4>Int range 1-10 | bytelenght 1 | retries 10000</h4>
        <?php
        $res = cryptRangeIntTest(1, 10, 10000);
        $res2 = cryptRangeStringTest(1, 10000)
        ?>

        <ul>
            <li>Integer: <?php echo $res[0] ?></li>
            <li>ByteString: <?php $os = $res2[0]; echo $res2[0] ?></li>
            <li>Interger: <?php echo $res[1] ?></li>
            <li>String : <?php echo $res2[1] ?></li>
        </ul>
        <h4>Int range 1-100 | bytelenght 2 | retries 10000</h4>
        <?php
        $res = cryptRangeIntTest(1, 100, 10000);
        $res2 = cryptRangeStringTest(1, 10000)
        ?>
        <ul>
            <li>Integer: <?php echo $res[0] ?></li>
            <li>ByteString: <?php echo $res2[0] ?></li>
            <li>Interger: <?php echo $res[1] ?></li>
            <li>String : <?php echo $res2[1] ?></li>
        </ul>
        <h4>Int range 1-1000 | bytelenght 3 | retries 10000</h4>
        <?php
        $res = cryptRangeIntTest(1, 1000, 10000);
        $res2 = cryptRangeStringTest(3, 10000)
        ?>
        <ul>
            <li>Integer: <?php echo $res[0] ?></li>
            <li>ByteString: <?php echo $res2[0] ?></li>
            <li>Interger: <?php echo $res[1] ?></li>
            <li>String : <?php echo $res2[1] ?></li>
        </ul>
        <h4>Int range 100-100000 | retries 1000000</h4>
        <?php $res = cryptRangeIntTest(1, 100000, 1000000); ?>
        <ul>
            <li>Integer: <?php echo $res[0] ?></li>
            <li>Interger: <?php echo $res[1] ?></li>
        </ul>
        <?php
            $string = '';
            for ($i = 0; $i < 10; $i++) {
                $string .= chr(random_int(0, 127));
            }
        ?>
        <p>
            Never forget length beats complexity -> using a dictionary database <br />
            and 4 random Ids which select words is better than an arbitrary 10 character string
        </p>
        <ul>
            <li>random ASCII Password generator: <?php echo $string; ?></li>
        </ul>
    </body>
</html>
