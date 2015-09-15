<?php
/**
 *
 * @author j
 * Date: 9/13/15
 * Time: 4:50 PM
 *
 * File: index.php
 */

?>
<html>
    <head>
        <title>Spaceship operator</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.8.0/styles/default.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.8.0/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
    </head>
    <body>
        <h1>combined comparison</h1>
        <table>
            <tr>
                <th>Operation</th>
                <th>Result</th>
            </tr>
            <tr>
                <td><pre><code class="php">1 <=> 0</code></pre></td>
                <td><?php echo 1 <=> 0; ?></td>
            </tr>
            <tr>
                <td><pre><code class="php">1 <=> 1</code></pre></td>
                <td><?php echo 1 <=> 1; ?></td>
            </tr>
            <tr>
                <td><pre><code class="php">0 <=> 1</code></pre></td>
                <td><?php echo 0 <=> 1; ?></td>
            </tr>
        </table>
        <h2>Example</h2>
        <table>
            <tr>
                <th>code</th>
                <th>result</th>
            </tr>
            <tr>
                <td>
                    <pre>
                        <code class="php">
$array = [1,5,24, 2, 1, 12];
$array2 = [5,1,12, 1, 2, 24];

// new style
usort($array, function($a, $b){
    return $a <=> $b;
});

// old style

usort($array2, function($a, $b)
{
    if ($a == $b) {
        return 0;
    } elseif($a > $b) {
        return 1;
    } else {
        return -1;
    }
});

if ($array == $array2) {
    echo 'same result';
}
                        </code>
                    </pre>
                </td>
                <td>
<?php
                    $array = [1,5,24, 2, 1, 12];
                    $array2 = [5,1,12, 1, 2, 24];

                    // new style
                    usort($array, function($a, $b){
                        return $a <=> $b;
                    });

                    // old style

                    usort($array2, function($a, $b)
                    {
                        if ($a == $b) {
                            return 0;
                        } elseif($a > $b) {
                            return 1;
                        } else {
                            return -1;
                        }
                    });

                    if ($array == $array2) {
                        echo 'same result';
                    }
?>
                </td>
            </tr>
        </table>
    </body>
</html>
