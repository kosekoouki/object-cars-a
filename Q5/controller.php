<?php
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

//設定処理
if(isset($_POST["first"])  ){
    require_once("session_init.php");
    // Honda
    $honda->priceGen();
    // Nissan
    $nissan->priceGen();
    // Ferrari
    $ferrari->priceGen();
    // Toyota
    $toyota->priceGen();
    $toyota->adjustAcceleration();
}

//選択処理
if(isset($_POST['setting'])){
    if(isset($_POST['car'])){
        $_SESSION['game']['car'] = $_POST['car'];
        $_SESSION['game']['money'] -= $_SESSION[$_POST['car']]["price"];
        //チェックポイントの設定
        $_SESSION['game']['check_point'] += $checkPoint;
        header("Location: view/playing_view.php");
        exit;
    }
    else{
        $_SESSION['message'] = "notSellect";
        header("Location: view/setting_view.php");
        exit; 
    }
}

//ゲーム処理
if(isset($_POST["start"]) and $_SESSION['game']['check_point'] < $goal){
    $check1 = false;
    $check2 = false;
    $check3 = false;
    $check4 = false;
    for($t=$_SESSION['game']['time'];$t<10000000;$t++){
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
    
    if ($_SESSION['ranking'][0] == $_SESSION['game']['car']) {
        $_SESSION['game']['win_count']++;
    }
    $_SESSION['game']['round']++;
    header("Location: view/playing_view.php");
    exit;
}
else{
    $_SESSION["message"] = "notstart";
    header("Location: view/playing_view.php");
    exit;
}

//画面遷移処理
if(isset($_POST['next'])){
    if($_SESSION['game']['round'] <= $maxround){
        require_once("session_init.php");
        // Honda
        $honda->priceGen();
        // Nissan
        $nissan->priceGen();
        // Ferrari
        $ferrari->priceGen();
        // Toyota
        $toyota->priceGen();
        $toyota->adjustAcceleration();
        header("Location: view/setting_view.php");
        exit;
    }
    else{
        header("Location: view/result_view.php");
        exit;
    }
}

//終了処理
if(isset($_POST['finish'])){
    header("Location: view/start_view.php");
    exit;
}
?>