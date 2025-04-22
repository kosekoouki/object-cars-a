<?php
require_once("car.php");

class Ferrari extends Car{
    public $name = "Ferrari";
    public $priceRange = ['min'=>3000,'max'=>5000];
    public $acceleration = 3.0;
    public $deceleration = 6.0;
    public $vehicleHeight = 100;

}
?>