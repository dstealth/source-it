<?php
require_once(__DIR__ . '/shop-project/auth.php');
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>File</title>
</head>
<body>

<form action="shop-project/script/upload.php" method="post" enctype="multipart/form-data">
    <h4>Загрузите файл: </h4>
    <input type=file name=uploadfile>
    <input type=submit value=Загрузить></form>
</form>

</body>
</html>
