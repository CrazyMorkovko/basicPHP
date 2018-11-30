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
    if (is_array($value)) {
        $menu .= "<li><a>" .$key. "</a>";
        $menu .= "<ul>";
        foreach ($value as $subKey => $subValue) {
            $menu .= "<li><a>$subValue</a></li>";
        }
        $menu .= "</ul></li>";
    } else {
        $menu .= "<li><a>" . $value . "</a></li>";
    }
}
$menu .= "</ul>";

$html = file_get_contents('index.html');
$html = str_replace('{menu}', $menu, $html);

echo $html;
