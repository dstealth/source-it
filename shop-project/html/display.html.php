<?php
if (isset($_GET['kind_of_sorting'])) {
    $sortParameter = $_GET['kind_of_sorting'];
    setcookie('kind_of_sorting', $sortParameter, time() + 3600*24);
}elseif (isset($_COOKIE['kind_of_sorting'])){
    $sortParameter = ($_COOKIE['kind_of_sorting']);
}else {
    $sortParameter = 'PriceZA';
}
require_once (__DIR__ . '/../auth.php');

// Подключение функций
require_once(__DIR__ . '/../script/all-functions.php');
// Подключение исполняемого сценария
require_once __DIR__ . '/../script/display.php';
?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div>

    <form action="" method="get">

        <select name="kind_of_sorting">
            <option <?php echo selectedSortKind("PriceZA") ?> value="PriceZA">цене &#8648</option>
            <option <?php echo selectedSortKind("PriceAZ") ?> value="PriceAZ">цене &#x21ca</option>
            <option <?php echo selectedSortKind("ProductNameAZ") ?> value="ProductNameAZ">названию &#x21ca</option>
            <option <?php echo selectedSortKind("ProductNameZA") ?> value="ProductNameZA">названию &#8648</option>
        </select>
        <button type="submit">Отсортировать товары по: </button>
    </form>
    <?php
//    var_dump($_GET);


$chooseSorting = mySorting(characteristicsThatWeNeed($displayAll), $sortParameter);

?>
    <?php foreach ($chooseSorting as $oneGroup) {?>
        <div>
        <?php foreach ($oneGroup as $key => $eachValue) { ?>
            <span><?php echo myEachValue($oneGroup, $key, $eachValue) ?></span>
        <?php } ?>
        </div>
    <?php } ?>

</div>
</body>
</html>