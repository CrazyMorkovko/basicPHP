<?php
$arr = scandir('images/max');

$arr = array_filter($arr, function ($string) {
    return $string !== '..' && $string !== '.';
});

$gallery = '<div class="galleryPreviewsContainer">';

foreach ($arr as $key => $value) {
    $gallery .=  '<a href="images/max/' . $value . '" target="_blank"><img src="images/min/' . $value .
        '" alt="Картинка' . ($key - 1) . '"></a>';
}

$gallery .= "</div>";

$html = file_get_contents('index.html');
$html = str_replace('{gallery}', $gallery, $html);

echo $html;
