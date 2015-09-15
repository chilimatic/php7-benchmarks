<?php
/**
 *
 * @author j
 * Date: 9/13/15
 * Time: 4:47 PM
 *
 * File: index.php
 */
$test = $_GET['user'] ?? 'No User';
?>
<html>
    <head>
        <title>Null-Coalesce-Operator | Isset ternary</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.8.0/styles/default.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.8.0/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
    </head>
    <body>
        <div>
            <pre>
                <code class="php">
                    $test = $_GET['user'] ?? 'No User';
                </code>
            </pre>
        </div>
        <h1>Welcome <?php echo $test ?></h1>
    </body>
</html>
