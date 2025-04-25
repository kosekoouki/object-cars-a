<?php require_once("../controller.php");?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding-top: 50px;
            color: #333;
            background-color:rgb(148, 203, 245); 
            margin: 10;              
            padding: 50;              
            width: 100vw;            
            height: 100vh;           
            overflow: hidden;
        }    
        
        h1 {
            font-size: 55px;
            margin-bottom: 30px;
            margin-top: 60px;    
        }

        .result-info {
            font-size: 40px;
            margin: 10px 0;
        }

        .result-outcome {
            font-size: 70px;
            font-weight: bold;
            color: <?= $_SESSION['game']['win_count'] == 2 ? '#28a745' : 'red' ?>;
            margin-bottom: 0px;  
        }

        .finish-button {
            padding: 15px 30px;     
            margin-top: 30px;           
            font-size: 16px;                
            background-color:rgb(10, 193, 65);
            color: white; 
            border: none;
            color: white;                   
            font-weight: bold;                 
            cursor: pointer;
            transition: all 0.3s ease;   
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .player{
            margin-left:20px;
            margin-right:20px;
        }
        
        .score{
            color:rgb(203, 14, 14);
        }
    </style>
</head>
<body>
    <div class="result-box">
        <h1>結果</h1>
        <div class="result-info">ラウンド数：<span class="score"><?= $_SESSION['game']['round'] ?></span></div>
        <div class="result-info">
            勝利数 <span class="player">プレイヤー１：<span class="score"><?= $_SESSION['game']['win_count_1'] ?></span></span>
            プレイヤー２：<span class="score"><?= $_SESSION['game']['win_count_2'] ?></span>
        </div>
        <div class="result-outcome"><?= $_SESSION['game']['win_count_1'] == 2 ? "🎉プレイヤー１：勝ち🎉" : "😢プレイヤー１：負け😢" ?></div>
        <div class="result-outcome"><?= $_SESSION['game']['win_count_2'] == 2 ? "🎉プレイヤー２：勝ち🎉" : "😢プレイヤー２：負け😢" ?></div>
        <form action="../controller.php" method="post">
        <input class="finish-button" type="submit" name="finish" value="🚗終了🚗">
        </form>
    </div>
</body>
</html>