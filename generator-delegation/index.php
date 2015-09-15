<?php
/**
 *
 * @author j
 * Date: 9/8/15
 * Time: 7:52 PM
 *
 * File: index.php
 */
$startMemory = memory_get_usage();
// 0 till 1000000 as result
function g() {
    yield 1;
    yield from iterateTheRest();
}

function iterateTheRest() {
    for ($i = 0; $i < 100000; $i++) {
        yield $i;
    }
}

// just iterate over all fields
foreach (g() as $yielded) {}
$endMemory = memory_get_usage();
?>
<html>
    <head>
        <title>Delegating Generators</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.8.0/styles/default.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.8.0/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
    </head>
    <style>
        td {
            text-align: right;
        }
    </style>
    <body>
        <table>
            <tr>
                <th>start Memory (kb)</th>
                <th>end Memory (kb)</th>
                <th>memory Peak (kb)</th>
            </tr>
            <tr>
                <td id="generator-start"><?php echo $startMemory / 1024; ?></td>
                <td id="generator-end"><?php echo $endMemory  / 1024 ; ?></td>
                <td id="generator-peak"><?php echo memory_get_peak_usage() / 1024 ?></td>
            </tr>
            <tr>
                <td colspan="3">
                    <h2>Generator Based Iterations</h2>
                    <pre>
                        <code class="php">
                            function g() { yield 1; yield from iterateTheRest();}

                            function iterateTheRest() { for ($i = 0; $i < 100000; $i++) { yield $i; }}

                            // just iterate over all fields
                            foreach (g() as $yielded) {}
                        </code>
                    </pre>
                </td>
            </tr>
<?php
unset($g, $yielded, $startMemory, $endMemory);
$startMemory = memory_get_usage();
$array = [];
for ($i = 0; $i < 10000; $i++) { $array[] = $i;}
$iterator = new ArrayIterator($array);
foreach ($iterator as $element) {}
$endMemory = memory_get_usage();
?>
            <tr>
                <td id="iterator-start"><?php echo $startMemory / 1024; ?></td>
                <td id="iterator-end"><?php echo $endMemory  / 1024; ?></td>
                <td id="iterator-peak"><?php echo memory_get_peak_usage() / 1024 ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left; font-weight: bold;">Difference:</td>
            </tr>
            <tr>
                <td id="diff-start"></td>
                <td id="diff-end"></td>
                <td id="diff-peak"></td>
            </tr>
            <tr>
                <td id="diff-percentage-start"></td>
                <td id="diff-percentage-end"></td>
                <td id="diff-percentage-peak"></td>
            </tr>
            <tr></tr>
        </table>
    </body>
</html>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        gData = {
            start: Number(document.getElementById('generator-start').textContent),
            end : Number(document.getElementById('generator-end').textContent),
            peak : Number(document.getElementById('generator-peak').textContent)
        };

        iData = {
            start: Number(document.getElementById('iterator-start').textContent),
            end : Number(document.getElementById('iterator-end').textContent),
            peak : Number(document.getElementById('iterator-peak').textContent)
        };

        document.getElementById('diff-start').textContent = iData.start - gData.start;
        document.getElementById('diff-end').textContent = iData.end - gData.end;
        document.getElementById('diff-peak').textContent = iData.peak - gData.peak;


        document.getElementById('diff-percentage-start').textContent = (iData.start != 0) ? iData.start / gData.start : 0;
        document.getElementById('diff-percentage-end').textContent = iData.end / gData.end;
        document.getElementById('diff-percentage-peak').textContent = iData.peak / gData.peak;

    });
</script>





