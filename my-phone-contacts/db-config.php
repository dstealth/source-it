<?php
header("Content-Type: text/html; charset=utf-8");
// DB hostname
$db_host = 'localhost';

// DB name
$db_name = 'projects';

// User name (login)
$db_user_name = 'root';

// Password
$db_password = '1';

// Set a UTF-8
//mysql_query("SET NAMES 'utf8'");
mysql_query('SET NAMES utf8');

// Create variable $connect, to connect to DB
$connect = mysql_connect($db_host, $db_user_name, $db_password) or die ("Невозможно подключится к БД: " . mysql_error());

// Get connect to DB "projects"
mysql_select_db($db_name) or die ("Ошибка соединения с БД: " . mysql_error());