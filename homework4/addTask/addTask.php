<?php
function logTime() {
    file_put_contents('logs/log.txt', date('c') . PHP_EOL, FILE_APPEND);
    $arr = array_filter(explode(PHP_EOL, file_get_contents('logs/log.txt')));

    if (count($arr) === 10) {
        // Сортировка имён файлов в алфавитном порядке по возрастанию.
        $list = scandir('logs');
        $lastElem = preg_replace('/[^0-9]/', '', $list[count($list) - 1]);

        if ($lastElem === '') {
            $logNumber = 0;
        } else {
            $logNumber = $lastElem + 1;
        }

        rename('logs/log.txt', "logs/log$logNumber.txt");    }
};

logTime();
