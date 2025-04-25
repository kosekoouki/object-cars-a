<?php
//親クラス
class Car{
    public $name;
    public $priceRange;
    public $brakeRate;
    public $maxSpead;

    //値段の出力
    function priceGen(){
        $_SESSION[$this->name]['price'] = rand($this->priceRange['min'],$this->priceRange['max']);
        $result = rand($this->priceRange['min'],$this->priceRange['max']);
        return $result;
    }

    //加速・減速・移動処理
    function calculateDistance(){
        $goal = $_SESSION['goal'];
        $accidentRate = 0;
        //加速・減速処理
        $brakeRate = rand(1,200);
        if($brakeRate >= $this->brakeRate){
            //加速
            $_SESSION[$this->name]['speed'] += $_SESSION[$this->name]['acceleration']*0.1;
        }
        else{
            //減速
            $_SESSION[$this->name]['speed'] -= $_SESSION[$this->name]['deceleration']*0.1;
        }

        //最大速度の設定
        $_SESSION[$this->name]['speed'] = min($_SESSION[$this->name]['speed'], $this->maxSpead);

        //事故判定処理
        $rate = rand(1,10000);
        //100km/h以下
        if($_SESSION[$this->name]['speed']<=28){
            $accidentRate = 5;
        }
        //150km/h以下
        elseif($_SESSION[$this->name]['speed']<=42){
            $accidentRate = 20;
        }
        //200km/h以下
        elseif($_SESSION[$this->name]['speed']<=56){
            $accidentRate = 50;
        }
        //250km/h以下
        elseif($_SESSION[$this->name]['speed']<=70){
            $accidentRate = 100;
        }
        //251km/h以上
        else{
            $accidentRate = 150;
        }
        //事故時に速度を0km/hにして、事故回数の保存を行う。
        if($rate <= $accidentRate) {
            $_SESSION[$this->name]['speed'] = 0;
            $_SESSION[$this->name]['accident_count'] ++;
        }

        //スピードに応じて位置を移動させる
        $_SESSION[$this->name]['distance'] += $_SESSION[$this->name]['speed']*0.1;
        //最大移動距離をゴールに設定
        $_SESSION[$this->name]['distance'] = min($_SESSION[$this->name]['distance'], $goal);
        //現在地の進行度を%表示
        $_SESSION[$this->name]['position'] = $_SESSION[$this->name]['distance']*100/$_SESSION['goal']; 
        
        //ゴール判定処理
        if($_SESSION[$this->name]['distance'] >= $_SESSION['goal']){
            return true;
        }
        else{
            return false;        
        }
    }
}
?>