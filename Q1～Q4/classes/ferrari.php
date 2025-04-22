<?php
class Ferrari{
    public $name = "Ferrari";
    public $capasity = 2;
    public $priceRange = ['min'=>3000,'max'=>5000];
    public $acceleration = 3.0;
    public $deceleration = 6.0;
    public $vehicleHeight = 100;

    public function upHeight(){
        if($this->vehicleHeight == 100){
            $this->vehicleHeight += 40;
            $this->acceleration *= 0.8;
    }
}
    public function downHeight(){
        if($this->vehicleHeight == 140){
            $this->vehicleHeight -=40;
            $this->acceleration /=0.8;
        }
    }
    
}
?>