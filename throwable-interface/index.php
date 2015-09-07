<?php
/**
 *
 * @author j
 * Date: 9/3/15
 * Time: 11:33 PM
 *
 * File: index.php
 */

// set the scalar types to be strict
declare(strict_types=1);

try {
    throw new Exception('One interface to catch them all! <br />');
} catch (Throwable $e) {
    echo $e->getMessage();
} finally {
    try {
        throw new RuntimeException('Lets see if it works ?<br />');
    } catch (Throwable $e) {
        echo $e->getMessage();
    } finally {
        try {
            throw new Error('Omg there are errors ? <br />');
        } catch (Throwable $e) {
            echo $e->getMessage();
        } finally {
            try {
                throw new notExisting();
            } catch (Throwable $e) {
                echo $e->getMessage() . '<br />';
            } finally {
                function scalarError(int $a) {
                    return $a;
                }

                try {
                    scalarError('wat!');
                } catch (Throwable $e) {
                    echo $e->getMessage();
                } finally {
                    echo "<br > ENAFF!!!! :D";
                }
            }
        }
    }
}






