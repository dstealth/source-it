<?php
//var_dump($_SERVER); die;
header("Content-Type: text/html; charset=utf-8");

// Начинаем сессию
session_start();


if (isset($_SESSION) && $_GET['logout'] == 'true'){
    session_destroy();
}

// Помещаем содержимое файла в массив
$access = array();
$access = file(__DIR__ . "/access.php");
// Разносим значения по переменным – пропуская первую строку файла - 0
$email = trim($access[1]);
$passw =trim($access[2]);

// Проверям были ли посланы данные
if (isset($_POST['email']) && isset($_POST['passw'])) {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['passw'] = md5($_POST['passw']);
}

// Если ввода не было, или они не верны
// просим их ввести
//var_dump($email, $passw, $_SESSION); die;
if (empty($_SESSION['email']) || $email != $_SESSION['email'] || $passw != $_SESSION['passw']) {

    // если нет совпадений или не правильно - нотификация

    ?>
    <h3>Вы не вошли в сисетму, для дальнейшей работы необходимо это сделать</h3>
    <form action="index.php" method="post">
        <label>Введите e-mail: </label>
        <input type="email" name="email">
        <br/><br/>

        <label>Введите пароль: </label>
        <input type="password" name="passw">
        <br/><br/>

        <button type="submit">Войти</button>
        <br/>
    </form>
    <?php
    die;
} elseif($_SERVER['REQUEST_URI'] == '/shop-project/auth.php') {
    echo 'Эта станица не доступна';
}else{
    ?>

   <div><a href="./index.php?logout=true">log out</a></div>
<?php } ?>