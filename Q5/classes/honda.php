<?php
//ホンダ
require_once('car.php');
class Honda extends Car{
    public $name = "honda";
    public $priceRange = ['min'=>500,'max'=>600];
    public $brakeRate = 5;
    public $maxSpead = 69.44;
    public $acceleration = 4;
    public $deceleration = 8;


    public function __construct(){
        $_SESSION[$this->name]['acceleration'] = $this->acceleration;
        $_SESSION[$this->name]['deceleration'] = $this->deceleration;
    }
}
?>