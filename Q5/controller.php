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
$maxround = 5;
$checkPoint = 1000;
$goal = 5000;
$_SESSION['goal'] = $goal;
$firstMoney = 3000;
$addMoney = 1000;
$_SESSION['honda']['distance'] = min($_SESSION['honda']['distance'], $goal);
$_SESSION['ferrari']['distance'] = min($_SESSION['ferrari']['distance'], $goal);
$_SESSION['nissan']['distance'] = min($_SESSION['nissan']['distance'], $goal);
$_SESSION['toyota']['distance'] = min($_SESSION['toyota']['distance'], $goal);

//設定処理
if(isset($_POST["first"])  ){
    setting();
    $_SESSION['game']['money']=$firstMoney;
    // Honda
    $honda->priceGen();
    // Nissan
    $nissan->priceGen();
    // Ferrari
    $ferrari->priceGen();
    // Toyota
    $toyota->priceGen();
    header("Location: view/setting_view.php");
    exit;
}

//選択処理
if(isset($_POST['setting'])){
    if(isset($_POST['car'])){
        if($_SESSION['game']['money'] >= $_SESSION[$_POST['car']]["price"]){
            //選択した車種をセッションに保持
            $_SESSION['game']['car'] = $_POST['car'];
            //使用した金額を所持金から引く
            $_SESSION['game']['money'] -= $_SESSION[$_POST['car']]["price"];
            //チェックポイントの設定
            $_SESSION['game']['check_point'] += $checkPoint;
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

//ゲーム処理
if(isset($_POST["start"])){
    if($_SESSION['game']['check_point'] <= $goal){
        $check1 = false;
        $check2 = false;
        $check3 = false;
        $check4 = false;
        for($_SESSION['game']['time'];$_SESSION['game']['time']<10000000;$_SESSION['game']['time']++){
            $check1 = $honda->calculateDistance();
            $check2 = $nissan->calculateDistance();
            $check3 = $ferrari->calculateDistance();
            $check4 = $toyota->calculateDistance();
            if($check1||$check2||$check3||$check4){
                break;
            }
        }
        $distance = [
            $_SESSION['honda']['distance']
            ,$_SESSION['nissan']['distance']
            ,$_SESSION['ferrari']['distance']
            ,$_SESSION['toyota']['distance']
        ];
        $distances = [
            'honda'   => $_SESSION['honda']['distance'],
            'nissan'  => $_SESSION['nissan']['distance'],
            'ferrari' => $_SESSION['ferrari']['distance'],
            'toyota'  => $_SESSION['toyota']['distance'],
        ];
        //チェックポイントの設定
        $_SESSION['game']['check_point'] += $checkPoint;
        //ランキング決め
        arsort($distances);
        $_SESSION['ranking'] = array_keys($distances);

        if($_SESSION['game']['check_point'] > $goal){
        $_SESSION['message'] = "goal"; 
        }
        header("Location: view/playing_view.php");
        exit;
    }
    else{
        header("Location: view/playing_view.php");
        $_SESSION['message'] = "notstart";
        exit;
    }
}


//画面遷移処理
if(isset($_POST['next'])){
    if($_SESSION['game']['check_point'] > $goal ){
        //勝利数の加算
        if ($_SESSION['ranking'][0] == $_SESSION['game']['car']) {
            $_SESSION['game']['win_count']++;
        }       
        sessionReset();
        if($_SESSION['game']['round'] < $maxround && $_SESSION['game']['win_count'] < 2){
            //ラウンドの加算
            $_SESSION['game']['round']++;
            //所持金の加算
            $_SESSION['game']['money'] += $addMoney;
            // Honda
            $honda->priceGen();
            // Nissan
            $nissan->priceGen();
            // Ferrari
            $ferrari->priceGen();
            // Toyota
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
$_SESSION['message']="";




?>