<?php

require_once(__DIR__ . '/../auth.php');

$enabledDirectoryPath = projectRootDir() . '/products/enabled/';

// Считать из файла все продукты
$allFilesDirectory = scandir($enabledDirectoryPath);
$allFiles = array_diff($allFilesDirectory, array('..', '.', '.txt'));

// Вывод вссех продуктов на дисплей
$displayAll = [];
foreach ($allFiles as $val) {

    $product = [];
    $fileContentArr = array_diff(explode("\n", file_get_contents($enabledDirectoryPath . $val)), array(''));
    foreach ($fileContentArr as $key => $value) {
        $propArr = explode(':', $value);
        if ($propArr[0] != 'image_url') {
            $product[$propArr[0]] = $propArr[1];
        } else {
            $product[$propArr[0]] = $propArr[1] . ':' . $propArr[2];
        }
    }

    $displayItems = $product;

    if ($product['special_price'] == 0) {
        $displayItems['price'] = ['value' => $displayItems['price'], 'specPrice' => false];
        unset($product['special_price'] );
    } else {
        $displayItems['price'] = ['value' => $displayItems['price'], 'specPrice' => true];
    }

    array_push($displayAll, $displayItems);
}


