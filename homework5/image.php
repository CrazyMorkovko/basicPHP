<?php
require_once('./config.php');
if (!isset($_GET['id'])) {
    echo 'Неверный id!';
    return;
}

$connection = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
$id = mysqli_real_escape_string($connection, $_GET['id']);

$result = mysqli_query($connection, "SELECT * FROM gallery WHERE id = $id");

$img = mysqli_fetch_assoc($result);

if (!$img) {
    echo 'Картинка не найдена!';
    return;
}
mysqli_query($connection, "UPDATE gallery SET count = count + 1 WHERE id = $id");

$gallery = "<div>Количество просмотров:" . ($img['count'] + 1) . "</div>";
$gallery .= "<img src='images/max/$img[url]' alt='$img[name]'>";

$html = file_get_contents('index.html');
$html = str_replace('{gallery}', $gallery, $html);

echo $html;
