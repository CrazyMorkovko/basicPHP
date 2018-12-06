<?php
$connection = mysqli_connect('localhost', 'avengerweb', '123456', 'gallery');
$result = mysqli_query($connection, 'SELECT * FROM gallery WHERE id =' . $_GET['id']);

$img = mysqli_fetch_assoc($result);
$gallery = '<img src="images/max/' . $img['url'] . '">';

$html = file_get_contents('index.html');
$html = str_replace('{gallery}', $gallery, $html);

echo $html;
