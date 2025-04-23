<?php
require_once("car.php");

class Ferrari extends Car{
    public $name = "ferrari";
    public $priceRange = ['min'=>3000,'max'=>5000];
    public $vehicleHeight = 100;
    public $brakeRate = 10;

    public function __construct(){

        $_SESSION[$this->name]['acceleration'] = 6;
        $_SESSION[$this->name]['deceleration'] = 12;
    }

}
?>