<?php

include __DIR__ . "/vendor/autoload.php";

use StringSearch\BaseQueryBuilder;
use StringSearch\RegexQueryBuilder;

$config = yaml_parse_file('config.yml');

//Создаем простой поиск
$query = new BaseQueryBuilder();
//Читаем файл на localhost'e
$result = $query->setSource('text.txt')->findSubstring('охотился')->getValue();

$queryRegex = RegexQueryBuilder();
$resultRegex = $query->setSource('text.txt')->findSubstring('/охотился/')->getValue();
echo $resultRegex->getData();



?>