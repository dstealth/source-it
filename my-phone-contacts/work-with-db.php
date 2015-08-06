<?php
header("Content-Type: text/html; charset=utf-8");

class DB
{

    public function __construct()
    {
        require_once "db-config.php";
    }

    public function save_in_db($name, $phone_number)
    {
        $query = "INSERT INTO my_phone_contacts (name, phone_number) VALUES ('$name', '$phone_number')";
        $result = mysql_query($query);
        if (!$result) die ("Сбой доступа к БД: " . mysql_error());
    }

}