<?php
require_once("car.php");
class Nissan extends Car {
    public $name = "Nissan";
    public $priceRange = ["min" => 250, "max" => 300];

    public function __construct(){

    $_SESSION[$this->name]['acceleration'] = 3; 
    $_SESSION[$this->name]['deceleration'] = 6; 

    }
}    
?>