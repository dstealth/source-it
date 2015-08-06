<?php
$file = "file.txt";

//function workWithFile ($file)
//{
    $openFile = fopen($file, "r");

    $readFile = fread($openFile, filesize($file));

    $closeFile = fclose($openFile);
//    return $readFile;
//}

$fileContent =  explode("\n", trim($readFile));
var_dump(
    $fileContent
);



