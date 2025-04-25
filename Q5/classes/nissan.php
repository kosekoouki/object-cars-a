<?php
require_once("car.php");
class Nissan extends Car {
    public $name = "nissan";
    public $priceRange = ["min" => 250, "max" => 300];
    public $brakeRate = 5;
    public $maxSpead = 55.56;

    public function __construct(){

    $_SESSION[$this->name]['acceleration'] = 3; 
    $_SESSION[$this->name]['deceleration'] = 6; 
    }
}    
?>

