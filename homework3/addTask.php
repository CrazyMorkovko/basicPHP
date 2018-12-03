<?php
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        if ($i === 0) {
            echo "$j ";
        } else {
            echo $j === 0 ? "$i " : $i * $j . " ";
        }
    }
    echo "\n";
}
