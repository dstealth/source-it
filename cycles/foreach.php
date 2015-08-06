<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <title>foreach</title>
</head>
<body>
<h4>Все числа от 1 до 100, сумма цифр которых равняется 10 (foreach)</h4>
<?php
//$foo = [];
//for ($x = 1; $x < 101; $x++) {
//    $foo[] = $x;
//}
$arr = range(1, 100);


foreach ($arr as $x) {
    if (!($x/100>=1)) {
        if ((int)($x / 10) + ($x % 10) == 10) {
        echo $x . " ";
        }
    }
}
?>
<form action="index.html">
    <button type="submit">Назад</button>
</form>
</body>
</html>