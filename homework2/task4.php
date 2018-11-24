<?php
function mathOperation ($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'add':
            return add($arg1, $arg2);
        case 'sub':
            return sub($arg1, $arg2);
        case 'multi':
            return multi($arg1, $arg2);
        case 'div':
            return div($arg1, $arg2);
    }
    return null;
}

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

echo mathOperation(1, 2, 'add') . "<br>";
echo mathOperation(-1,-2, 'sub') . "<br>";
echo mathOperation(1,-2, 'multi') . "<br>";
echo mathOperation(-1,2, 'div') . "<br>";
