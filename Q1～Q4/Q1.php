<?php
require_once("classes/honda.php");
require_once("classes/nissan.php");
require_once("classes/ferrari.php");

function showCarInfo($car) {
    echo "車種：{$car->name}<br>";
    echo "値段：{$car->price}<br>";
    echo "定員：{$car->capacity}<br>";
    echo "アクセル：{$car->acceleration}m/s²<br>";
    echo "ブレーキ：{$car->deceleration}m/s²<br>";
    echo "<hr>"; // 区切り線
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