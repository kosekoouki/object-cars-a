<?php

require_once 'classes/ferrari.php';


$ferrari = new Ferrari();

echo "初期加速:{$ferrari->acceleration} m/s²、初期車高:{$ferrari->vehicleHeight}mm<br>";

$ferrari->upHeight();
echo "アップ後加速:{$ferrari->acceleration} m/s²、アップ後車高:{$ferrari->vehicleHeight}mm<br>";

$ferrari->downHeight();
echo "ダウン後加速:{$ferrari->acceleration} m/s²、ダウン後車高:{$ferrari->vehicleHeight}mm<br>";

?>