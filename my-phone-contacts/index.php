<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="save-in-db.php" method="POST">
    <label>Имя</label> <input type="text" name="name">
    <br/><br/>

    <label>Номер телефона</label> <input type="text" name="phone_number">
    <br/><br/>

    <button type="submit">Сохранить</button>
</form>

<form action="show_all.php" method="post">
    <button type="submit"> Посмотреть весь список контактов</button>
</form>
</body>
</html>