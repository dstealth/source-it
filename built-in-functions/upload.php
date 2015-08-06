<?php
header("Content-Type: text/html; charset=utf-8");
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["uploadfile"]["tmp_name"]))
   {
       // Если файл загружен успешно, перемещаем его
       // из временной директории в конечную
       move_uploaded_file($_FILES["uploadfile"]["tmp_name"], __DIR__.$_FILES["uploadfile"]["name"]);
   } else {
       echo("Ошибка загрузки файла");
   }
?>