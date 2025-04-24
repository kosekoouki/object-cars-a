<?php
class Car{
    public $name;
    public $priceRange;
    public $acceleration;
    public $deceleration;
    public $brakeRate;

    //値段の出力
    function priceGen(){
        $_SESSION[$this->name]['price'] = rand($this->priceRange['min'],$this->priceRange['max']);
        $result = rand($this->priceRange['min'],$this->priceRange['max']);
        return $result;
    }

    //加速・減速・移動処理
    function calculateDistance(){
        $accidentRate = 0;
        $brakeRate = rand(1,200);
        $rate = rand(1,1000);
        if($brakeRate >= $this->brakeRate){
            $_SESSION[$this->name]['speed'] += $_SESSION[$this->name]['acceleration'];               //加速する
        }
        else{
            $_SESSION[$this->name]['speed'] -= $_SESSION[$this->name]['deceleration'];               //減速する
        }
        if($_SESSION[$this->name]['speed']<=28){
            $accidentRate = 5;
        }
        elseif($_SESSION[$this->name]['speed']<=42){
            $accidentRate = 20;
        }
        elseif($_SESSION[$this->name]['speed']<=56){
            $accidentRate = 50;
        }
        else{
            $accidentRate = 100;
        }
        if($rate <= $accidentRate) {
            $_SESSION[$this->name]['speed'] = 0;
            $_SESSION[$this->name]['accident_count'] ++;
        }
        $_SESSION[$this->name]['distance'] += $_SESSION[$this->name]['speed'];                         //進む
        $_SESSION[$this->name]['position'] = $_SESSION[$this->name]['distance']*100/$_SESSION['goal']; //位置指定処理
        if($_SESSION[$this->name]['distance'] >= $_SESSION['game']['check_point']){
            return true;
        }
        else{
        return false;        
        }
    }
}
?>