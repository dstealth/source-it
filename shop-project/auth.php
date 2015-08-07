<?php
//var_dump($_SERVER); die;
header("Content-Type: text/html; charset=utf-8");

// Начинаем сессию
session_start();

require_once __DIR__ . '/script/all-functions.php';

/**
 *
 *
 *
 *
 *
 *
 */
// Помещаем содержимое файла в массив
$access = array();
$access = file(__DIR__ . "/access.php");
// Разносим значения по переменным – пропуская первую строку файла - 0
$email = trim($access[1]);
$password =trim($access[2]);


if (isset($_POST["login"]) && isset($_POST["password"])) { //Если логин и пароль были отправлены
    if (!auth($_POST["login"], $_POST["password"])) { //Если логин и пароль введен не правильно
        echo '<h2 style="color:red">Логин и пароль введен не правильно!</h2>';
    }
}

if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        out(); //Выходим
        header("Location: ?is_exit=0"); //Редирект после выхода
    }
}

if (isAuth()) { // Если пользователь авторизован, приветствуем:
    echo "Здравствуйте, " . getLogin() ;
    echo "<a href='?is_exit=1'>log out</a><br/>"; //Показываем кнопку выхода

}
else { //Если не авторизован, показываем форму ввода логина и пароля
    ?>
    <form method="post" action="">
        Логин: <input type="text" name="login"
                      value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // Заполняем поле по умолчанию ?>" />
        <br/>
        Пароль: <input type="password" name="password" value="" /><br/>
        <input type="submit" value="Войти" />
    </form>

<?php
    exit();
}


































//if (isset($_SESSION) && $_GET['logout'] == 'true'){
//    session_destroy();
//}
//
//// Помещаем содержимое файла в массив
//$access = array();
//$access = file(__DIR__ . "/access.php");
//// Разносим значения по переменным – пропуская первую строку файла - 0
//$email = trim($access[1]);
//$passw =trim($access[2]);
//
//// Проверям были ли посланы данные
//if (isset($_POST['email']) && isset($_POST['passw'])) {
//    $_SESSION['email'] = $_POST['email'];
//    $_SESSION['passw'] = md5($_POST['passw']);
//}
//
//// Если ввода не было, или они не верны
//// просим их ввести
////var_dump($email, $passw, $_SESSION); die;
//if (empty($_SESSION['email']) || $email != $_SESSION['email'] || $passw != $_SESSION['passw']) {
//
//    // если нет совпадений или не правильно - нотификация
//
//    ?>
<!--    <h3>Вы не вошли в сисетму, для дальнейшей работы необходимо это сделать</h3>-->
<!--    <form action="index.php" method="post">-->
<!--        <label>Введите e-mail: </label>-->
<!--        <input type="email" name="email">-->
<!--        <br/><br/>-->
<!---->
<!--        <label>Введите пароль: </label>-->
<!--        <input type="password" name="passw">-->
<!--        <br/><br/>-->
<!---->
<!--        <button type="submit">Войти</button>-->
<!--        <br/>-->
<!--    </form>-->
<!--    --><?php
//    die;
//} elseif($_SERVER['REQUEST_URI'] == '/shop-project/auth.php') {
//    echo 'Эта станица не доступна';
//}else{
//    ?>
<!---->
<!--   <div><a href="./index.php?logout=true">log out</a></div>-->
<?php //} ?>