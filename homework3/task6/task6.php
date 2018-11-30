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

$menu = "<ul class='menu'>";
foreach ($arr as $key => $value) {
    if (is_array($value)) {
        $menu .= "<li class='menu__list-item'><a class='menu__item'>" .$key. "</a>";
        $menu .= "<ul class='menu menu--sub'>";
        foreach ($value as $subKey => $subValue) {
            $menu .=
                "<li class='menu__list-item--sub'><a class='menu__item--sub'>$subValue</a></li>";
        }
        $menu .= "</ul></li>";
    } else {
        $menu .= "<li class='menu__list-item'><a class='menu__item'>" . $value . "</a></li>";
    }
}
$menu .= "</ul>";

$html = file_get_contents('index.html');
$html = str_replace('{menu}', $menu, $html);

echo $html;
