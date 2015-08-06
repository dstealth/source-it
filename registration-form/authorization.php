<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <title>Авторизация</title>
</head>
<body>


<h2>Авторизация прошла успешно</h2>

<p>Вы выбрали:
    <?php
    if ($_REQUEST['remember'] == 'yes') echo 'запомнить меня';
    else echo 'не запоминать меня';
    ?>
</p>

<p>E-mail: <?php echo $_REQUEST['email']; ?></p>

<p>Пароль: <?php echo $_REQUEST['password'] ?></p>

<form action="index.html">
    <button type="submit">Вернутся назад</button>
</form>
<form action="http://php.net/">
    <button type="submit">Вход</button>
</form>
</body>
</html>
