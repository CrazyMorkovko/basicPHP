<?php
$string = "Привет Мир";

function replace($string) {
    return str_replace(' ', '_', $string);
}

echo replace($string);
