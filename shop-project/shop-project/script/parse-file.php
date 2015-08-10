<?php
require_once(__DIR__ . '/../auth.php');
// Открытьи изначального файла в формате .CSV
$readFile = workWithFile($fileDir);

// Разделение изначального файла на строки
$fileContent = explode("\n", trim($readFile));

// Разделение титлов
$titles = explode(";", trim($fileContent[0]));

/**
 *Цикл для приведения изначального файла в необходимый вид
 */

$groupedItems = [];
foreach ($fileContent as $key => $rows) {
    // Пропускаем первую строку, где находятся титлы
    if ($key == 0) {
        continue;
    }

    $row = explode(";", trim($rows));

    // Получаю массив в которм ключи-значения превого массива, значения-значения второго массива
    $groupedItems[] = array_combine(titlesCorrectFormat($titles), $row);
    // Принудительная установка указателя на необходимый ключ, для дальнейшей работы
    end($groupedItems);
    $lastInd = key($groupedItems);
    // Форматирование
    $groupedItems[$lastInd]['sku'] = correctItems($groupedItems[$lastInd]['sku'], 'sku');
    $groupedItems[$lastInd]['price'] = correctItems($groupedItems[$lastInd]['price'], 'price');
    $groupedItems[$lastInd]['special_price'] = correctItems($groupedItems[$lastInd]['special_price'], 'special_price');

    $sku = $groupedItems[$lastInd]['sku'];
    $color_id = $groupedItems[$lastInd]['color_id'];
    // Добавление в массив image_url
    $groupedItems[$lastInd] += ['image_url' => gatherImageUrl($sku, $color_id)];

    // Пременная для записи массива в файл в файл
    $itemsForWriting = '';
    // Перебор массива массива и формирование $itemsForWriting
    foreach ($groupedItems[$lastInd] as $key2 => $value) {
        $itemsForWriting .= $key2 . ':' . $value . "\n";
    }
    // Запись в файлы enable/disable

    if ($groupedItems[$lastInd]['is_enabled'] == 'yes') {
        file_put_contents(__DIR__ . '/../products/enabled/' . $groupedItems[$lastInd]['sku'] . ".txt", $itemsForWriting);
    } else {
        file_put_contents(__DIR__ . '/../products/disabled/' . $groupedItems[$lastInd]['sku'] . ".txt", $itemsForWriting);
    }

}