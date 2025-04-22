<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Q4.php" method="post">
        Honda：
        <select name="honda" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option> 
        </select><br>
        Nissan：
        <select name="nissan" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select><br>
        Ferrari：
        <select name="ferrari" >
            <option value="1">1</option>
            <option value="2">2</option>
        </select><br>
        <input type="submit" name="submit" value="決定">
    </form><br>
</body>
</html>

<?php
require_once("classes/honda.php");
require_once("classes/nissan.php");
require_once("classes/ferrari.php");

function showCarInfo($car) {
    echo "車種：{$car->name}<br>";
    echo "値段：{$car->price}万円<br>";
    echo "定員：{$car->capacity}人<br>";
    echo "アクセルを踏んだ時の加速：{$car->acceleration}m/s²<br>";
    echo "ブレーキを踏んだ時の減速：{$car->deceleration}m/s²<br>";
    echo "<hr>"; // 区切り線
}

if(isset($_POST['submit'])){
// Honda
$honda = new Honda($_POST['honda']);
$honda->priceGen();
$honda->adjustAcceleration();
showCarInfo($honda);

// Nissan
$nissan = new Nissan($_POST['nissan']);
$nissan->priceGen();
$nissan->adjustAcceleration();
$nissan->defect();
showCarInfo($nissan);

// Ferrari
$ferrari = new Ferrari($_POST['ferrari']);
$ferrari->priceGen();
$ferrari->adjustAcceleration();
showCarInfo($ferrari);
}
?>