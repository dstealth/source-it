<?php

header("Content-Type: text/html; charset=utf-8");

require_once(__DIR__ . '/../auth.php');

require_once(__DIR__ . '/all-functions.php');


$fileName = $_FILES["uploadfile"]["name"];
$fileDir = projectRootDir() . '/upload-file/' . $fileName;
//var_dump($fileDir); die;
$isFileUpload = is_uploaded_file($_FILES["uploadfile"]["tmp_name"]);
if ($isFileUpload) {
    // Если файл загружен успешно, перемещаем его
    // из временной директории в конечную
    move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $fileDir);
    echo 'Файл загружен успешно в папку: ' . $fileDir;
} else {
    echo 'Ошибка загрузки файла';
    echo returnHomeForm();
    die;
}




// Разбить файл по папкам
require_once __DIR__ . '/parse-file.php';

// Вывести на экран доступные товары
?>
<form action="../html/display.html.php">
    <button type="submit"><h4>Посмотреть доступные товары</h4></button>
</form>