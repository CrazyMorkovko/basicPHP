<?php
$mimeTypes = [
    "image/gif",
    "image/jpg",
    "image/jpeg",
    "image/png",
    "image/svg+xml",
];

if (isset($_POST['upload'])) {
    if (isset($_FILES['img']) &&
        in_array($_FILES['img']['type'], $mimeTypes) &&
        $_FILES['img']['size'] < 5 * 1024 * 1024) {
        move_uploaded_file($_FILES['img']['tmp_name'], 'images/' . $_FILES['img']['name']);
    } else {
        echo "Неверный тип файла или размер файла превышает 5 Мб <br>";
    }
}

$arr = scandir('images');

$arr = array_filter($arr, function ($string) {
    return $string !== '..' && $string !== '.';
});

$gallery = '<div class="galleryPreviewsContainer">';

foreach ($arr as $key => $value) {
    $gallery .=  '<a href="images/' . $value . '" target="_blank"><img width="300px" src="images/' . $value . '" alt="Картинка' . ($key - 1) . '"></a>';
}

$gallery .= "</div>";

$html = file_get_contents('index.html');
$html = str_replace('{gallery}', $gallery, $html);

echo $html;
