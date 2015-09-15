<html>
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>relative Memory (Bytes)</th>
                <th>absolute Memory (Bytes)</th>
                <th>difference</th>
            </tr>
        </thead>
        <tr>
            <td>startMemory</td>
            <td align="right" class="relative"><?php echo memory_get_usage() ?></td>
            <td align="right"><?php echo memory_get_usage(true) ?></td>
            <td align="right" class="result">0</td>
        </tr>
        <tr>
            <td>bool Memory</td>
            <td align="right" class="relative"><?php $bool = true; echo memory_get_usage() ?> </td>
            <td align="right"><?php echo memory_get_usage(true) ?> </td>
            <td align="right" class="result"></td>
        </tr>
        <tr>
            <td>int Memory</td>
            <td align="right" class="relative"><?php $int = 19024; echo memory_get_usage() ?> </td>
            <td align="right"><?php echo memory_get_usage(true) ?> </td>
            <td align="right" class="result"></td>
        </tr>
        <tr>
            <td>float Memory</td>
            <td align="right" class="relative"><?php $float = 104.22; echo memory_get_usage() ?> </td>
            <td align="right"><?php echo memory_get_usage(true) ?> </td>
            <td align="right" class="result"></td>
        </tr>
        <tr>
            <td>array Memory</td>
            <td align="right" class="relative"><?php $array = array(); echo memory_get_usage()  ?> </td>
            <td align="right"><?php echo memory_get_usage(true)  ?> </td>
            <td align="right" class="result"></td>
        </tr>
        <tr>
            <td>Object Memory</td>
            <td align="right" class="relative"><?php $std = new stdClass(); echo memory_get_usage() ?> </td>
            <td align="right"><?php echo memory_get_usage(true) ?> </td>
            <td align="right" class="result"></td>
        </tr>
        <tr>
            <td>1000 ints in 1 array Memory</td>
            <td align="right" class="relative"> <?php
                for ($i =0; $i < 1000; $i++) {
                    $array[] = 19024;
                }
                ?>
                <?php echo memory_get_usage() ?></td>
            <td align="right"><?php echo memory_get_usage(true) ?></td>
            <td align="right" class="result"></td>
        </tr>

        <tr>
            <td>1000 arrays Memory</td>
            <td align="right" class="relative"> <?php
                for ($i =0; $i < 1000; $i++) {
                    $array[] = array($i);
                }
                ?>
                <?php echo memory_get_usage() ?></td>
            <td align="right"><?php echo memory_get_usage(true) ?></td>
            <td align="right" class="result"></td>
        </tr>
        <tr>
            <td>1000 objects</td>
            <td align="right" class="relative"> <?php
                for ($i =0; $i < 1000; $i++) {
                    $array[] = new stdClass();
                }
                ?>
                <?php echo memory_get_usage() ?></td>
            <td align="right"><?php echo memory_get_usage(true) ?></td>
            <td align="right" class="result"></td>
        </tr>
        <tr>
            <td>10000 objects</td>
            <td align="right" class="relative"> <?php
                for ($i =0; $i < 10000; $i++) {
                    $array[] = new stdClass();
                }
                ?>
                <?php echo memory_get_usage() ?></td>
            <td align="right"><?php echo memory_get_usage(true) ?></td>
            <td align="right" class="result"></td>
        </tr>
        <tr>
            <td>another 10000 objects</td>
            <td align="right" class="relative"> <?php
                for ($i =0; $i < 10000; $i++) {
                    $array[] = new stdClass();
                }
                ?>
                <?php echo memory_get_usage() ?></td>
            <td align="right"><?php echo memory_get_usage(true) ?></td>
            <td align="right" class="result"></td>
        </tr>
        <tr>
            <td>another 10000 objects</td>
            <td align="right" class="relative"> <?php
                for ($i =0; $i < 10000; $i++) {
                    $array[] = new stdClass();
                }
                ?>
                <?php echo memory_get_usage() ?></td>
            <td align="right"><?php echo memory_get_usage(true) ?></td>
            <td align="right" class="result"></td>
        </tr>
        <tr>
            <td>another 10000 objects</td>
            <td align="right" class="relative"> <?php
                for ($i =0; $i < 10000; $i++) {
                    $array[] = new stdClass();
                }
                ?>
                <?php echo memory_get_usage() ?></td>
            <td align="right"><?php echo memory_get_usage(true) ?></td>
            <td align="right" class="result"></td>
        </tr>
        <tr>
            <td>another 10000 objects</td>
            <td align="right" class="relative"> <?php
                for ($i =0; $i < 10000; $i++) {
                    $array[] = new stdClass();
                }
                ?>
                <?php echo memory_get_usage() ?></td>
            <td align="right"><?php echo memory_get_usage(true) ?></td>
            <td align="right" class="result"></td>
        </tr>
    </table>
</html>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var usageCollection = document.querySelectorAll('.relative');
        var resultColletion = document.querySelectorAll('.result');
        for (var i = 0; i < usageCollection.length; i++) {
            element1 = usageCollection.item(i);
            element2 = usageCollection.item(i+1);

            if (element2) {
                resultColletion.item(i+1).textContent = (Number(element2.textContent) - Number(element1.textContent));
            }

        }
    });
</script>