<?php
require_once('car.php');

class Honda extends Car{
    public $name = "Honda";
    public $priceRange = ['min'=>500,'max'=>600];
    public $acceleration = 4.0;
    public $deceleration = 8.0;

    
}
?>