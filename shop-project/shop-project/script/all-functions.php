<?php
require_once(__DIR__ . '/../auth.php');
// Возвращает корневой каталог
function projectRootDir(){
    return $_SERVER['DOCUMENT_ROOT'] . '/shop-project/shop-project';
}


// Создает кнопку для возрата на домашнюю страницу
function returnHomeForm()
{
    $formDir = __DIR__ . '/../html/return-home-form.html';
    $openForm = fopen($formDir, 'r');
    $readForm = fread($openForm, filesize($formDir));
    fclose($openForm);
    return $readForm;
}

// Работате с файлом
function workWithFile($fileDir)
{
    if (file_exists($fileDir)) {
        $openFile = fopen($fileDir, "r");

        $readFile = fread($openFile, filesize($fileDir));

        $closeFile = fclose($openFile);
        return $readFile;
    } else {
        echo 'Файлы не существует';
    }
}


// Форматирует наименования характеристик товара
function titlesCorrectFormat($titles)
{
    $result = [];
    foreach ($titles as $key => $title) {
        $title = strtolower($title);
        $title = str_replace(" ", "_", $title);
        $title = str_replace("?", "", $title);
        $result[] = $title;
    }
    return $result;
}


// Форматирует характеристики товара
function correctItems($item, $format)
{
    switch ($format) {
        case 'sku':
            return str_replace(" ", "-", $item);
            break;
        case 'price':
        case 'special_price':
            $bar = str_replace(",", ".", $item);
            return floatval($bar);
            break;
    }
}


// Возвращает URL для картинки каждого товара
function gatherImageUrl($sku, $color_id)
{
    return 'http://cdn.richandroyal.de/media/external/D/' . $sku . '_' . $color_id . '_1_455.jpg';
}


// Callback-функция для сортировки цены от Меньшего к Большему (A - Z)
function cmpPriceAZ($a, $b)
{
    if ($a['price']['specPrice'] == true && $b['price']['specPrice'] == false) {
        if ($a['special_price'] == $b['price']['value']) {
            return 0;
        }
        return ($a['special_price'] < $b['price']['value']) ? -1 : 1;
    }
    elseif ($a['price']['specPrice'] == false && $b['price']['specPrice'] == true) {
        if ($a['price']['value'] == $b['special_price']) {
            return 0;
        }
        return ($a['price']['value'] < $b['special_price']) ? -1 : 1;
    }
    elseif ($a['price']['specPrice'] == true && $b['price']['specPrice'] == true){
        if ($a['special_price'] == $b['special_price']) {
            return 0;
        }
        return ($a['special_price'] < $b['special_price']) ? -1 : 1;
    }
    else{
        if ($a['price']['value'] == $b['price']['value']) {
            return 0;
        }
        return ($a['price']['value'] < $b['price']['value']) ? -1 : 1;
    }

}


// Callback-функция для сортировки цены от Большего к Меньшему (Z - A)
/**
 * @param $a
 * @param $b
 * @return int
 */
function cmpPriceZA($a, $b){
    if ($a['price']['specPrice'] == true && $b['price']['specPrice'] == false) {
        if ($a['special_price'] == $b['price']['value']) {
            return 0;
        }
        return ($a['special_price'] > $b['price']['value']) ? -1 : 1;
    }
    elseif ($a['price']['specPrice'] == false && $b['price']['specPrice'] == true) {
        if ($a['price']['value'] == $b['special_price']) {
            return 0;
        }
        return ($a['price']['value'] > $b['special_price']) ? -1 : 1;
    }
    elseif ($a['price']['specPrice'] == true && $b['price']['specPrice'] == true){
        if ($a['special_price'] == $b['special_price']) {
            return 0;
        }
        return ($a['special_price'] > $b['special_price']) ? -1 : 1;
    }
    else{
        if ($a['price']['value'] == $b['price']['value']) {
            return 0;
        }
        return ($a['price']['value'] > $b['price']['value']) ? -1 : 1;
    }
}


// Анонимная callback-функция для сортировки названия в алфавитном порядке (A - Z)
/**
 * @param $a
 * @param $b
 * @return int
 */
function cmpProductNameAZ($a, $b){
    return strnatcasecmp($a['product_name'], $b['product_name']);
};


// Анонимная callback-функция для сортировки названия в порядке обратном алфавитному (Z - A)
function cmpProductNameZA($a, $b){
    return -strnatcasecmp($a['product_name'], $b['product_name']);
};


// Сортировка
/**
 * @param $array
 * @param string $type
 * @return mixed
 */
function mySorting($array, $type = 'PriceZA'){
    switch ($type) {
        // Сортировка по цене от Большего к Меньшему (Z - A)
        case 'PriceZA':
            usort($array, 'cmpPriceZA');
            return $array;
        // Сортировка по цене от Меньшего к Большему (A - Z)
        case 'PriceAZ':
            usort($array, 'cmpPriceAZ');
            return $array;
        // Сортировка по названию в алфавитном порядке (A - Z)
        case 'ProductNameAZ':
            usort($array, 'cmpProductNameAZ');
            return $array;
        // Сортировка по названию в порядке обратном алфавитному  (Z - A)
        case 'ProductNameZA':
            usort($array, 'cmpProductNameZA');
            return $array;
    }
}


// Характеристики, которые будут выводится
function characteristicsThatWeNeed($displayAll)
{
    $dispOnScreen = [];
    $dispItemOnScreen = [];
    foreach ($displayAll as $displayOne) {

        foreach ($displayOne as $titl => $charact) {
            switch ($titl) {
                case 'product_name':
                    $dispItemOnScreen[$titl] = $charact;
                    break;
                case 'short_description':
                    $dispItemOnScreen[$titl] = $charact;
                    break;
                case 'price':
                    if ($displayOne['price']['specPrice'] == true) {
                        $dispItemOnScreen[$titl]['value'] = '<s>' . $displayOne['price']['value'] . '</s>';
                        $dispItemOnScreen[$titl]['specPrice'] = $displayOne['price']['specPrice'];
                    } else {
                        $dispItemOnScreen[$titl]['value'] = $displayOne['price']['value'];
                        $dispItemOnScreen[$titl]['specPrice'] = $displayOne['price']['specPrice'];
                    }
                    break;
                case 'special_price':
                    if ($displayOne['price']['specPrice'] == true) {
                        $dispItemOnScreen[$titl] = $charact;
                    } else {
                        continue;
                    }
                    break;
                case 'image_url':
                    $dispItemOnScreen[$titl] = '<img src=' . $charact . ' height="300" width="200">';
                    break;
            }
        }
        $dispOnScreen[] = $dispItemOnScreen;
        $dispItemOnScreen = [];

    }
    return $dispOnScreen;
}



// Условие для вывода необхлдимого значения
function myEachValue($array, $arrayKey, $arrayValue)
{
    if ($arrayKey == 'price') {
        return $array['price']['value'];
    } else {
        return $arrayValue;
    }
}


// Выбор сортировки
function selectedSortKind($position)
{
    if (
        (isset($_COOKIE['kind_of_sorting']) && $_COOKIE['kind_of_sorting'] == $position) ||
        (isset($_GET['kind_of_sorting']) && $_GET['kind_of_sorting'] == $position)
    ) {
        return 'selected';
    } else {
        return '';
    }
}

/**
 * Проверяет, авторизован пользователь или нет
 * Возвращает true если авторизован, иначе false
 * @return boolean
 */
function isAuth() {
    if (isset($_SESSION["is_auth"])) {
        return $_SESSION["is_auth"];
    }
    else return false;
}


/**
 * Авторизация пользователя
 * @param string $login
 * @param string $passwors
 */
function auth($login, $password, $Memail, $Mpassword) {
    $passw = md5($password);
    if ($login == $Memail && $passw == $Mpassword) {
        $_SESSION["is_auth"] = true;
        $_SESSION["login"] = $login;
        return true;
    }
    else { //Логин и пароль не подошел
        $_SESSION["is_auth"] = false;
        return false;
    }
}


/**
 * Функция возвращает логин авторизованного пользователя
 */
function getLogin() {
    if (isAuth()) { //Если пользователь авторизован
        $arr = explode("@", $_SESSION["login"]);

        return ucfirst($arr[0]); //Возвращаем логин, который записан в сессию
    }
}




function out() {
    $_SESSION = array(); //Очищаем сессию
    session_destroy(); //Уничтожаем
}