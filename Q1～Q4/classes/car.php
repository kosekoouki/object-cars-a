<?php
class Car{
    public $price;
    public $acceleration;
    public $deceleration;
    public $capacity;
    function priceGen(){
        $result = rand($this->price['min'],$this->price['max']);
        return $result; 
    }
    function adjustAcceleration(){
        $this->acceleration = $this->acceleration * (1-($this->capacity * 0.05));
        return $this->acceleration;
    }
}
?>