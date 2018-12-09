<?php
function mathOperation ($arg1, $arg2, $operation) {
    switch ($operation) {
        case '+':
            return add($arg1, $arg2);
        case '-':
            return sub($arg1, $arg2);
        case '*':
            return multi($arg1, $arg2);
        case '/':
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['number1'], $_POST['number2'], $_POST['operation']) &&
        is_numeric($_POST['number1']) && is_numeric($_POST['number2'])) {
        if ($_POST['operation'] !== '/' || $_POST['number2'] != 0) {
            $answer = 'Ответ: ' . mathOperation($_POST['number1'], $_POST['number2'], $_POST['operation']);
        } else {
            $answer = 'Делить на 0 нельзя!';
        }
    } else {
        $answer = 'Введите числа!';
    }
}

$html = file_get_contents('index.html');
$html = str_replace('{answer}', $answer, $html);

echo $html;
