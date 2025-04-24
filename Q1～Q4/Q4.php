<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
require_once("classes/honda.php");
require_once("classes/nissan.php");
require_once("classes/ferrari.php");

function showCarInfo($car) {
    echo "車種：{$car->name}<br>";
    echo "値段：{$car->price}万円<br>";
    echo "定員：{$car->capacity}人<br>";
    echo "本来の加速度：{$car->originalAcceleration}m/s²<br>";
    echo "乗員数による加速変化：<br>";
    capacityGen($car);
}
function capacityGen($car){
    for($i=1; $i <= $car->capacity; $i++){
        $car->currentPassenger = $i;
        $car->acceleration = $car->originalAcceleration;
        $car->adjustAcceleration();
        echo "{$i}人乗車時:{$car->acceleration}m/s²<br>";
    }

    echo "ブレーキを踏んだ時の減速：{$car->deceleration}m/s²<br>";
    echo "<hr>"; // 区切り線
}

// Honda
$honda = new Honda;
$honda->priceGen();
$honda->adjustAcceleration();
showCarInfo($honda);

// Nissan
$nissan = new Nissan;
$accBeforeDefect = $nissan->acceleration;
$nissan->defect();
$nissan->priceGen();
$nissan->adjustAcceleration();
echo "車種：{$nissan->name}<br>";
echo "値段：{$nissan->price}万円<br>";
echo "定員：{$nissan->capacity}人<br>";
echo "本来の加速度：{$nissan->originalAcceleration}m/s²<br>";
echo "故障前の加速度：{$accBeforeDefect}m/s²<br>";
capacityGen($nissan);

// Ferrari
$ferrari = new Ferrari;
$ferrari->priceGen();
$ferrari->adjustAcceleration();
showCarInfo($ferrari);

?>