<?php
function add ($a, $b) {
    return $a + $b;
}

function sub ($a, $b) {
    return $a - $b;
}

function multi ($a, $b) {
    return $a * $b;
}

function div ($a, $b) {
    return $a / $b;
}

echo add(1, 2) . "<br>";
echo sub(-1,-2) . "<br>";
echo multi(1,-2) . "<br>";
echo div(-1,2) . "<br>";
