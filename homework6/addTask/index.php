<?php
require_once('./config.php');
$connection = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
$result = mysqli_query($connection, 'SELECT * FROM gallery ORDER BY count DESC');

$mimeTypes = [
    "image/gif",
    "image/jpg",
    "image/jpeg",
    "image/png",
    "image/svg+xml",
];

if (isset($_POST['upload'])) {
    if (isset($_FILES['img']) && $_FILES['img']['name'][0]) {
        for ($i = 0; $i < count($_FILES['img']); $i++) {
            $name = $_FILES['img']['name'][$i];
            $size = $_FILES['img']['size'][$i];
            $tmp_name = $_FILES['img']['tmp_name'][$i];
            $type = $_FILES['img']['type'][$i];
            if (in_array($type, $mimeTypes) && $size < 5 * 1024 * 1024) {
                move_uploaded_file($tmp_name, 'images/' . $name);
                mysqli_query($connection,
                    "INSERT INTO gallery (url, size, name) VALUES ('$name', '$size', '$name')");
                header('Location: /homework6/addTask/index.php');
            } else {
                echo "Неверный тип файла($name) или размер файла превышает 5 Мб <br>";
            }
        }
    } else {
        echo 'Выберите файлы!';
    }
}

$arr = [];

while ($row = mysqli_fetch_assoc($result)) {
    $arr[] = $row;
}

$gallery = '<div class="galleryPreviewsContainer">';

foreach ($arr as $key => $value) {
    $gallery .=  '<a href="image.php?id=' . $value['id'] . '" target="_blank"><img width="300px" src="images/' .
        $value['url'] . '" alt="' . $value['name'] . '"></a>';
}

$gallery .= "</div>";

$html = file_get_contents('index.html');
$html = str_replace('{gallery}', $gallery, $html);

echo $html;
