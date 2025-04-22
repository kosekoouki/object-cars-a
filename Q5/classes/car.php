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
    }

    //加速・減速・移動処理
    function calculateDistance(){
        $result = rand(1,100);
        if($result >= $this->brakeRate){
            $_SESSION[$this->name]['speed'] += $this->acceleration;               //加速する
        }
        else{
            $_SESSION[$this->name]['speed'] += $this->deceleration;               //減速する
        }
        $_SESSION[$this->name]['distance'] += $_SESSION[$this->name]['speed'];  //進む
        if($_SESSION[$this->name]['distance'] >= $_SESSION['check_point']){
            return true;
        }
        return false;        
    }
}
?>