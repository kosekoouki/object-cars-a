<?php
require_once("controller.php");
if($_SESSION['finish']){  
    exit;
}
else{
    require_once("classes/honda.php");
    require_once("classes/nissan.php");
    require_once("classes/ferrari.php");
    require_once("classes/toyota.php");

    //ゲーム処理
    $honda = new Honda();
    $nissan = new Nissan();
    $ferrari = new Ferrari();
    $toyota = new Toyota();
    $check1 = false;
    $check2 = false;
    $check3 = false;
    $check4 = false;
    $check1 = $honda->calculateDistance();
    $check2 = $nissan->calculateDistance();
    $check3 = $ferrari->calculateDistance();
    $check4 = $toyota->calculateDistance();

    $_SESSION['game']['time'] += 0.1;

    //ランキング決め     
    $distances = [
        'honda'   => $_SESSION['honda']['distance'],
        'nissan'  => $_SESSION['nissan']['distance'],
        'ferrari' => $_SESSION['ferrari']['distance'],
        'toyota'  => $_SESSION['toyota']['distance'],
    ];
    arsort($distances);
    $_SESSION['ranking'] = array_keys($distances);

    //レース終了判定処理
    if($check1 || $check2 || $check3 || $check4){
        $_SESSION['finish']=true;
    }
    else{
        $_SESSION['finish']=false;
    }

    //jsonの形に変更
    header("Content-Type: application/json");
    echo json_encode([
        'finish' => $_SESSION['finish'],
        'car' => [
            'honda' => $_SESSION['honda'],
            'nissan' => $_SESSION['nissan'],
            'ferrari' => $_SESSION['ferrari'],
            'toyota' => $_SESSION['toyota']
        ],
        'ranking' => $_SESSION['ranking'],
        'time' => round($_SESSION['game']['time'],1),
    ]);
    exit;
}
?>