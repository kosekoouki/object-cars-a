<?php
require_once('car.php');

class Honda extends Car{
    public $name = "honda";
    public $priceRange = ['min'=>500,'max'=>600];
    public $brakeRate = 10;

    public function __construct(){

        $_SESSION[$this->name]['acceleration'] = 4;
        $_SESSION[$this->name]['deceleration'] = 8;
        
    }
}
?>