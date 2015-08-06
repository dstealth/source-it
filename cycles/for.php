<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <title>for</title>
</head>
<body>
<h4>Все простые числа от 1 до 100 (for)</h4>
<?php
for ($x = 1; $x <= 100; $x++) {
    $isSimple = true;
    for($k = 2; $k<$x;$k++){
        if ($x%$k == 0){
            $isSimple = false;
            break;
        }
    }
    if ($isSimple){
        echo $x . '<br/>';
    }
}
?>
<form action="index.html">
    <button type="submit">Назад</button>
</form>
</body>
</html>

