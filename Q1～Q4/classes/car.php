<?php
class Car{
    public $price;
    public $priceRange;
    public $acceleration;
    public $currentPassenger;
    public $originalAcceleration;

    function priceGen(){
        $this->price = rand($this->priceRange['min'],$this->priceRange['max']);
    }
    function adjustAcceleration(){
        $this->originalAcceleration = $this->acceleration;
        
        if ($this->currentPassenger >= 1) {
            $rate = 0.05 * ($this->currentPassenger);
            $this->acceleration *= (1 - $rate);
            $this->acceleration = round($this->acceleration, 2);
        }    
    }
}
?>