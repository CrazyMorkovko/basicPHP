<?php
$arr = [
    "Картинка1" => "1.jpg",
    "Картинка2" => "2.jpg",
    "Картинка3" => "3.jpg",
    "Картинка4" => "4.jpg",
];

$gallery = '<div class="galleryPreviewsContainer">';
foreach ($arr as $key => $value) {
    $gallery .= '<img src="images/min/' . $value . '" data-full_image_url="images/max/' . $value . '" alt="' . $key . '">';
}
$gallery .= "</div>";

$html = file_get_contents('index.html');
$html = str_replace('{gallery}', $gallery, $html);

echo $html;
