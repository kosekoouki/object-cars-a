<?php
class Car{
    public $price;
    public $priceRange;
    public $acceleration;
    public $deceleration;
    public $capacity;
    function __construct($capacity){
        $this->capacity = $capacity;
    }
    function priceGen(){
        $this->price = rand($this->priceRange['min'],$this->priceRange['max']);
    }
    function adjustAcceleration(){
        $this->acceleration = $this->acceleration * (1-($this->capacity * 0.05));
    }
}
?>