<?php
header("Content-Type: text/html; charset=utf-8");
// Каталог, в который мы будем принимать файл:
$uploaddir = 'images/upload';
$uploadfile = __FILE__.basename($_FILES['uploadfile']['name']);
echo '<pre>';
print_r($_FILES);
echo '</pre>';
// Копируем файл из каталога для временного хранения файлов:
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile))
{
    echo "<h3>Файл успешно загружен на сервер</h3>";
}
else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }