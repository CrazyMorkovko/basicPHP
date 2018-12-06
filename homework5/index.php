<?php
require_once('./config.php');
$connection = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
$result = mysqli_query($connection, 'SELECT * FROM gallery ORDER BY count DESC');

$arr = [];

while ($row = mysqli_fetch_assoc($result)) {
    $arr[] = $row;
}

$gallery = '<div class="galleryPreviewsContainer">';

foreach ($arr as $key => $value) {
    $gallery .=  '<a href="image.php?id=' . $value['id'] . '" target="_blank"><img src="images/min/' . $value['url'] .
        '" alt="' . $value['name'] . '"></a>';
}

$gallery .= "</div>";

$html = file_get_contents('index.html');
$html = str_replace('{gallery}', $gallery, $html);

echo $html;
