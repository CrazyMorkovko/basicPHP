<?php
$arr = [
    "Главная",
    "Новости" => [
        "Новости спорта",
        "Новости о политике",
        "Новости науки"
    ],
    "О нас",
    "Контакты"
];

$menu = "<ul>";
foreach ($arr as $key => $value) {
    $menu .= "<li><a>";

    if (is_array($value)) {
        $menu .= $key;
        $menu .= "<ul>";
        foreach ($value as $subKey => $subValue) {
            $menu .= "<li><a>$subValue</a></li>";
        }
        $menu .= "</ul>";
    } else {
        $menu .= $value;
    }

    $menu .= "</a></li>";
}
$menu .= "</ul>";

$html = file_get_contents('index.html');
$html = str_replace('{menu}', $menu, $html);

echo $html;
