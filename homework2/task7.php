<?php
function currentTime() {
    $time = "";
    $hours = (int)date('G');
    $minutes = (int)date('i');

    $time .= $hours . ' ' . plural($hours, ['час', 'часа', 'часов']) . ' ' .
        $minutes . ' ' . plural($minutes, ['минута', 'минуты', 'минут']);

    return $time;
}

function plural(int $quantity, array $wordVariants) {
    $quantity10 = $quantity % 10;
    $quantity100 = $quantity % 100;
    if ($quantity10 === 1 && $quantity100 !== 11) {
        return $wordVariants[0];
    } elseif (in_array($quantity10, [2, 3, 4]) && !in_array($quantity100, [12, 13, 14])) {
        return $wordVariants[1];
    } else {
        return $wordVariants[2];
    }
}

echo currentTime();
