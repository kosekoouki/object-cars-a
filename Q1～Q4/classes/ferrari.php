<?php
require_once("car.php");
class Ferrari extends Car{
    public $name = "Ferrari";
    public $priceRange = ['min'=>3000,'max'=>5000];
    public $acceleration = 6.0;
    public $deceleration = 12.0;
    public $vehicleHeight = 100;

    public function __construct($capacity = 2) {
        parent::__construct($capacity); // ← 親にデフォルト値を渡す
    }

    public function upHeight(){
        if($this->vehicleHeight == 100){
            $this->vehicleHeight += 40;
            $this->acceleration *= 0.8;
    }
}
    public function downHeight(){
        if($this->vehicleHeight == 140){
            $this->vehicleHeight -=40;
            $this->acceleration /=0.8;
        }
    }
    
}
?>