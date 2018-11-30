<?php
$year = date('Y');

$html = file_get_contents('index.html');
$html = str_replace('{year}', $year, $html);

echo $html;
