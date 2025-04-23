<?php
require_once("car.php");
class Nissan extends Car {
    public $name = "Nissan";
    public $priceRange = ["min" => 250, "max" => 300];
    public $acceleration = 3.0;  
    public $deceleration = 6.0; 
    public $defectjudg = true;

    public function __construct($capacity = 4) {
        parent::__construct($capacity); // ← 親にデフォルト値を渡す
    }

    public function defect() {
        $this->acceleration *= 0.6;
    }
}
?>