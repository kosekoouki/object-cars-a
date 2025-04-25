<?php
//フェラーリ
require_once("car.php");
class Ferrari extends Car{
    public $name = "ferrari";
    public $priceRange = ['min'=>3000,'max'=>5000];
    public $brakeRate = 5;
    public $maxSpead = 83.33;
    public $acceleration = 6;
    public $deceleration = 12;

    public function __construct(){
        $_SESSION[$this->name]['acceleration'] = $this->acceleration;
        $_SESSION[$this->name]['deceleration'] = $this->deceleration;
    }

}
?>