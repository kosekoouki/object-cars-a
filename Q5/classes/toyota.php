<?php
require_once("car.php");
class Toyota extends Car {
    public $name = "toyota";
    public $priceRange = ["min" => 200, "max" => 2000];
    public $brakeRate = 10;

    public function __construct(){
        $price = $_SESSION['toyota']['price'];

        if($price >=200 && $price <=400){
            $_SESSION[$this->name]['acceleration'] = 3; $_SESSION[$this->name]['deceleration'] = 6;
        }
        elseif($price >=401 && $price <= 1000){
            $_SESSION[$this->name]['acceleration'] = 4; $_SESSION[$this->name]['deceleration'] = 8;
        }
        elseif($price >= 1001 && $price <= 2000){
            $_SESSION[$this->name]['acceleration'] = 5; $_SESSION[$this->name]['deceleration'] = 10;
        }   
    }

}
?>