<?php
//フェラーリ
require_once("car.php");
class Ferrari extends Car{
    public $name = "ferrari";
    public $priceRange = ['min'=>3000,'max'=>5000];
    public $brakeRate = 5;
    public $maxSpead = 83.33;

    public function __construct(){
        $_SESSION[$this->name]['acceleration'] = 6;
        $_SESSION[$this->name]['deceleration'] = 12;
    }

}
?>