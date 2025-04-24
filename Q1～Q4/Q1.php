<?php
require_once("classes/honda.php");
require_once("classes/nissan.php");
require_once("classes/ferrari.php");

function showCarInfo($car) {
    echo "車種：{$car->name}".PHP_EOL;
    echo "値段：{$car->price}万円".PHP_EOL;
    echo "定員：{$car->capacity}人".PHP_EOL;
    echo "アクセル：{$car->acceleration}m/s²".PHP_EOL;
    echo "ブレーキ：{$car->deceleration}m/s²".PHP_EOL;
    echo str_repeat("-", 20) . PHP_EOL; // 区切り線
}

// Honda
$honda = new Honda();
$honda->priceGen();
showCarInfo($honda);

// Nissan
$nissan = new Nissan();
$nissan->priceGen();
showCarInfo($nissan);

// Ferrari
$ferrari = new Ferrari();
$ferrari->priceGen();
showCarInfo($ferrari);
?>