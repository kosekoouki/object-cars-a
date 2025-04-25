<?php
require_once("car.php");
class Nissan extends Car {
    public $name = "Nissan";
    public $priceRange = ["min" => 250, "max" => 300];
    public $acceleration = 3.0;  
    public $deceleration = 6.0; 
    public $defectjudg = true;
    public $capacity = 4;
    public function defect() {
        $this->acceleration *= 0.6;
    }
}
?>