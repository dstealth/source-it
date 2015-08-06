<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <title>while</title>
</head>
<body>
<h4>Все числа от 1 до 100, содержащие цифру 7 (while)</h4>
<?php
$x = 1;
while ($x <= 100) {
    $x++;
    if ($x % 10 == 7) echo $x . ' ';
}
?>
<form action="index.html">
    <button type="submit">Назад</button>
</form>
</body>
</html>
