<?php
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        if ($i === 0) {
            echo "$j ";
        } else {
            if ($j === 0) {
                echo "$i ";
            } else {
                echo $i * $j . " ";
            }
        }
    }
    echo "\n";
}
