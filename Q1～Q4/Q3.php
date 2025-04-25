<?php
require_once("classes/ferrari.php");
require_once("classes/honda.php");
require_once("classes/nissan.php");
require_once("classes/car.php");

$ferrariCount = rand(1,5);
$hondaCount = rand(1,5);
$nissanCount = rand (1,5);

$ferrariPrice = [];
$hondaPrice = [];
$nissanPrice = [];
$allPrice = [];


for($i=0;$i<$ferrariCount;$i++){
    $ferrari = new Ferrari();
    $ferrari->priceGen();
    $ferrariPrice [] = $ferrari->price;
    $allPrice[] = $ferrari->price;
}

for($i=0;$i<$hondaCount;$i++){
    $honda = new Honda();        
    $honda -> priceGen();
    $hondaPrice [] = $honda->price;
    $allPrice[] = $honda->price;
}

for($i=0;$i<$nissanCount;$i++){
    $nissan = new Nissan();
    $nissan -> priceGen();
    $nissanPrice [] = $nissan->price;
    $allPrice[] = $nissan->price;
}

function calcTotalAndAverage($price){
    $sum = array_sum($price);
    $avg = round($sum / count($price));
    return ['sum'=>$sum, 'avg'=>$avg];
}

$count = count($allPrice);
$allResult = calcTotalAndAverage($allPrice);

echo "全車種 合計生成台数: {$count}台、合計金額: {$allResult['sum']}万円、平均金額: {$allResult['avg']}万円<br>";