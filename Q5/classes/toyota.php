<?php
require_once("car.php");
class Toyota extends Car {
    public $name = "toyota";
    public $priceRange = ["min" => 200, "max" => 2000];
    public $brakeRate = 10;
    public $acceleration = [3,4,5];
    public $deceleration = [6,8,10];
    public $maxSpead = [55.56,66.67,77.78];


    public function __construct(){
        $price = $_SESSION['toyota']['price'];

        if($price >=200 && $price <=400){
            $_SESSION[$this->name]['acceleration'] = $this->acceleration[0]; 
            $_SESSION[$this->name]['deceleration'] = $this->deceleration[0];
            $_SESSION[$this->name]['speed'] = min($_SESSION[$this->name]['speed'], $this->maxSpead[0]);
        }
        elseif($price >=401 && $price <= 1000){
            $_SESSION[$this->name]['acceleration'] = $this->acceleration[1]; 
            $_SESSION[$this->name]['deceleration'] = $this->deceleration[1];
            $_SESSION[$this->name]['speed'] = min($_SESSION[$this->name]['speed'], $this->maxSpead[1]);
        }
        elseif($price >= 1001 && $price <= 2000){
            $_SESSION[$this->name]['acceleration'] = $this->acceleration[2];
            $_SESSION[$this->name]['deceleration'] = $this->deceleration[2];
            $_SESSION[$this->name]['speed'] = min($_SESSION[$this->name]['speed'], $this->maxSpead[2]);
        }   
    }

}
?>