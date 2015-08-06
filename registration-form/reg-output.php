<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <title>Регистрация</title>
</head>
<body>

<h2>Просмотр формы регистрации</h2>

<p>Вы ввели следующие данные:</p>

<p>Имя: <?php echo $_REQUEST['name'] ?></p>

<p>Фамилия: <?php echo $_REQUEST['surname'] ?></p>

<p>Дата рождения:
    <?php
    // Месяца словами для использования в дате рождения
    switch ($_REQUEST['month']) {
        case 1:
            $month = 'января';
            break;
        case 2:
            $month = 'февраля';
            break;
        case 3:
            $month = 'марта';
            break;
        case 4:
            $month = 'апреля';
            break;
        case 5:
            $month = 'мая';
            break;
        case 6:
            $month = 'июня';
            break;
        case 7:
            $month = 'июля';
            break;
        case 8:
            $month = 'августа';
            break;
        case 9:
            $month = 'сентября';
            break;
        case 10:
            $month = 'октября';
            break;
        case 11:
            $month = 'ноября';
            break;
        case 12:
            $month = 'декабря';
            break;
    }

    // Месяца словами для выдачи ошибки
    switch ($_REQUEST['month']) {
        case 1:
            $monthErr = 'январе';
            break;
        case 2:
            $monthErr = 'февраля';
            break;
        case 3:
            $monthErr = 'марта';
            break;
        case 4:
            $monthErr = 'апреля';
            break;
        case 5:
            $monthErr = 'мая';
            break;
        case 6:
            $monthErr = 'июня';
            break;
        case 7:
            $monthErr = 'июля';
            break;
        case 8:
            $monthErr = 'августа';
            break;
        case 9:
            $monthErr = 'сентября';
            break;
        case 10:
            $monthErr = 'октября';
            break;
        case 11:
            $monthErr = 'ноября';
            break;
        case 12:
            $monthErr = 'декабря';
            break;
    }

    // Вывод даты рождения
    echo $_REQUEST['day'] . ' ', $month . ' ', $_REQUEST['year'] . ' года';

    // Условие для проверки даты рождения
    if (((int)($_REQUEST['year']) % 4 == 0) && ($_REQUEST['month'] == 2) && ($_REQUEST['day'] > 29)) echo '<font color="red"> - Не верно введенные данные. В этом году в феврале 29 дней.</font>';
    elseif (((int)($_REQUEST['year']) % 4 != 0) && ($_REQUEST['month'] == 2) && ($_REQUEST['day'] > 28)) echo '<font color="red"> - Не верно введенные данные. В этом году в феврале 28 дней.</font>';
    elseif ((($_REQUEST['month'] == 4) || ($_REQUEST['month'] == 6) || ($_REQUEST['month'] == 9) || ($_REQUEST['month'] == 11)) && ($_REQUEST['day'] > 30)) echo '<font color="red"> - Не верно введенные данные. В ' . $monthErr . ' 30 дней.</font>';
    else echo '.';

    ?>
</p>

<p>
    <?php
    // Вывод каким образом будет восстановлен утерянный пароль
    switch ($_REQUEST['password_restore']) {
        case 'mail':
            echo 'В случае утери пароля Вы его восстановите с помощью электронной почты.';
            break;
        case 'tel':
            echo 'В случае утери пароля Вы его восстановите с помощью мобильного телефона.';
            break;
        case 'none':
            echo 'В случае утери пароля Вы его не будете восстанавливать.';
            break;
    }
    ?>
</p>

<p>Новые уведомления будут отправляться на:</p>
<ul type="circle">
    <?php if (isset($_REQUEST['new_notification_on_mail'])) echo '<li>электронную почту</li>';
    if (isset($_REQUEST['new_notification_on_tel'])) echo '<li>мобильный телефон</li>';
    if (isset($_REQUEST['new_notification_on_home'])) echo '<li>домашний почтовый ящик</li>';
    ?>
</ul>



<?php
// Если ошибка будет выведена кнопка вернутся назад, нет ошибки -  сохранить и перейти на страницу
if (((int)($_REQUEST['year']) % 4 == 0) && ($_REQUEST['month'] == 2) && ($_REQUEST['day'] > 29)) echo '<form action="registration.php"><button type="submit">Обнаружена ошибка! Исправить.</button></form>';
elseif (((int)($_REQUEST['year']) % 4 != 0) && ($_REQUEST['month'] == 2) && ($_REQUEST['day'] > 28)) echo '<form action="registration.php"><button type="submit">Обнаружена ошибка! Исправить.</button></form>';
elseif ((($_REQUEST['month'] == 4) || ($_REQUEST['month'] == 6) || ($_REQUEST['month'] == 9) || ($_REQUEST['month'] == 11)) && ($_REQUEST['day'] > 30)) echo '<form action="registration.php"><button type="submit">Обнаружена ошибка! Исправить.</button></form>';
else echo '<form action="http://php.net/"><button type="submit">Сохранить и войти</button></form>';
?>
</body>
</html>