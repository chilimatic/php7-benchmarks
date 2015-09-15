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
?>
<html>
    <head>
        <title>Throwable Interface</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.8.0/styles/default.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.8.0/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
    </head>
    <body>
        <h1>Throwable Interface</h1>
        <pre>
            <code class="php">
try {
    throw new Exception('One interface to catch them all!');
} catch (Throwable $e) {
    echo $e->getMessage();
} finally {
    try {
        throw new RuntimeException('Lets see if it works ?');
    } catch (Throwable $e) {
        echo $e->getMessage();
    } finally {
        try {
            throw new Error('Omg there are errors ?');
        } catch (Throwable $e) {
            echo $e->getMessage();
        } finally {
            try {
                throw new notExisting();
            } catch (Throwable $e) {
                echo $e->getMessage();
            } finally {
                function scalarError(int $a) {
                    return $a;
                }
                try {
                    scalarError('wat!');
                } catch (Throwable $e) {
                    echo $e->getMessage();
                } finally {
                    echo "ENAFF!!!! :D";
                }
            }
        }
    }
}
            </code>
        </pre>
        <p>
            <?php try {
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
?>
        </p>
    </body>

</html>


