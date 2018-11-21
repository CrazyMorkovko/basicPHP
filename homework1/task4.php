<?php
$h1 = "<h1>Hello, world!</h1>";
$title = "<title>HTML</title>";
$year = date('Y');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?= $title ?>
</head>
<body>
<?= $h1 ?>
<?= $year ?>
</body>
</html>
