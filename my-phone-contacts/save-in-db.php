<?php
header("Content-Type: text/html; charset=utf-8");
var_dump($_REQUEST); die;
require_once "work-with-db.php";
$new_record = new DB;
$record = $new_record->save_in_db($_REQUEST["name"], $_REQUEST["phone_number"]);
if (!empty ($record)){
    echo "S U C S E S S";
}
?>
<form action="index.php" method="post">
    <button type="submit">Вернутся назад</button>
</form>