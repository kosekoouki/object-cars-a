<?php
session_start();

require_once("session_init.php");
require_once("classes/honda.php");
require_once("classes/nissan.php");
require_once("classes/ferrari.php");
require_once("classes/toyota.php");

$honda = new Honda();
$nissan = new Nissan();
$ferrari = new Ferrari();
$toyota = new Toyota();

//ゲーム設定
$maxround = 5;
$goal = 10;
$_SESSION['goal'] = $goal;
$firstMoney = 3000;
$addMoney = 1000;


//初期設定処理
if(isset($_POST["first"])){
    setting();
    //sessionの初期設定
    $_SESSION['game']['money_1']=$firstMoney;
    $_SESSION['game']['money_2']=$firstMoney;
    //車種ごとの値段生成
    $honda->priceGen();
    $nissan->priceGen();
    $ferrari->priceGen();
    $toyota->priceGen();
    header("Location: view/setting_view.php");
    exit;
}

//車種選択処理
if(isset($_POST['setting'])){
    if(isset($_POST['car_1']) && isset($_POST['car_2'])){
        if($_SESSION['game']['money_1'] >= $_SESSION[$_POST['car_1']]["price"] && $_SESSION['game']['money_2'] >= $_SESSION[$_POST['car_2']]["price"]){
            //選択した車種をセッションに保持
            $_SESSION['game']['car_1'] = $_POST['car_1'];
            $_SESSION['game']['car_2'] = $_POST['car_2'];
            //使用した金額を所持金から引く
            $_SESSION['game']['money_1'] -= $_SESSION[$_POST['car_1']]["price"];
            $_SESSION['game']['money_2'] -= $_SESSION[$_POST['car_2']]["price"];
            header("Location: view/playing_view.php");
            exit;
        }
        else{
            $_SESSION['message'] = "notpay";
            header("Location: view/setting_view.php");
            exit; 
        }
    }
    else{
        $_SESSION['message'] = "notsellect";
        header("Location: view/setting_view.php");
        exit; 
    }
}


//画面遷移処理
if(isset($_POST['next'])){
    if($_SESSION['finish']){
        //勝利数の加算
        if ($_SESSION['ranking'][0] == $_SESSION['game']['car_1']) {
            $_SESSION['game']['win_count_1']++;
        }
        if ($_SESSION['ranking'][0] == $_SESSION['game']['car_2']) {
            $_SESSION['game']['win_count_2']++;
        }
        //車種データのセッションリセット       
        sessionReset();
        if($_SESSION['game']['round'] < $maxround && $_SESSION['game']['win_count_1'] < 2 && $_SESSION['game']['win_count_2'] < 2){
            //ラウンドの加算
            $_SESSION['game']['round']++;
            //所持金の加算
            $_SESSION['game']['money_1'] += $addMoney;
            $_SESSION['game']['money_2'] += $addMoney;


            //車種ごとの値段の再設定
            $honda->priceGen();
            $nissan->priceGen();
            $ferrari->priceGen();
            $toyota->priceGen();
            header("Location: view/setting_view.php");
            exit;
        }
        else{
            header("Location: view/result_view.php");
            exit;
        }
    }
    else{
        header("Location: view/playing_view.php");
        $_SESSION['message'] = "notnext";
        exit;
    }
}

//終了処理
if(isset($_POST['finish'])){
    //セッションデータの削除
    session_destroy();
    header("Location: view/start_view.php");
    exit;
}

//メッセージ管理
switch ($_SESSION['message']) {
    case "":
        $message = "";
        break;
    case "notsellect":
        $message = "車種を選択してください。";
        break;
    case "notpay":
        $message = "お金が足りません";
        break;
    case "goal":
        $message = "ゴール！";
        break;
    case "notstart":
        $message = "すでにゴールしました。";
        break;
    case "notnext":
        $message = "ラウンドが終わってません";
        break;
}
//メッセージの初期化
$_SESSION['message']="";
?>