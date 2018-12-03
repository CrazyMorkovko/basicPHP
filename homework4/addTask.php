<?php
function logTime() {
    file_put_contents('log.txt', date('c') . PHP_EOL, FILE_APPEND);
};

logTime();
