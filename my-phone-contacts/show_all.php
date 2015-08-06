<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
require_once "db-config.php";
$MySQLRecordSet = mysql_query('SELECT name, phone_number FROM my_phone_contacts');
?>
<table  border="1" width="50%" cellpadding="5">
    <tr width=100px>
        <?php
        $iter = 0;
        while ($name = @mysql_field_name($MySQLRecordSet, $iter++)) {
            ?>
            <th><?php echo $name; ?></th>
        <?php
        }
        ?>
    </tr>
    <?php
    while ($Result = mysql_fetch_assoc($MySQLRecordSet)) {
        ?>
        <tr>
            <?php
            foreach ($Result as $k => $val) {
                ?>
                <td><?php echo $val; ?></td>
            <?php
            }
            ?>
        </tr>
    <?php
    }
    ?>
</table>
<form action="index.php" method="post">
    <button type="submit">Вернутся назад</button>
</form>
</body>
</html>