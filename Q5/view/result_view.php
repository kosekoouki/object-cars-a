<?php require_once("../controller.php");?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding-top: 50px;
            color: #333;
            background-color:rgb(244, 192, 50); 
            margin: 0;              
            padding: 0;              
            width: 100vw;            
            height: 100vh;           
            overflow: hidden;        /* コンテンツがはみ出さないようにする（必要に応じて） */
        }    

      
        h1 {
            font-size: 70px;
            margin-bottom: 30px;
            margin-top: 10px;
            
        }

        .result-info {
            font-size: 22px;
            margin: 10px 0;
        }

        .result-outcome {
            font-size: 90px;
            font-weight: bold;
            color: <?= $_SESSION['game']['win_count'] == 2 ? '#28a745' : 'red' ?>;
            margin-bottom: 30px; 
            
        }

        .finish-button {
            padding: 12px 30px;                
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
        
          /* コンテナにflexboxを設定して右寄せ */
          .container {
            display: flex;
            justify-content: flex-end;  /* 画像を右側に寄せる */
            align-items: center;        /* 垂直方向で中央寄せ */
            height: 10vh;              /* コンテナの高さを画面全体に */
        }

            img {
            width: 30%;  
            height: auto;  

        }
</style>


<body>
    <div class="result-box">
        <h1>結果</h1>
        <div class="result-info">ラウンド数：<?= $_SESSION['game']['round'] ?></div>
        <div class="result-info">勝利数：<?= $_SESSION['game']['win_count'] ?></div>
        <div class="result-outcome"><?= $_SESSION['game']['win_count'] == 2 ? "勝ち" : "負け" ?></div>
        <form action="../controller.php" method="post">
        <input class="finish-button" type="submit" name="finish" value="終了">
        </form>
    </div>

    
    <div class="container">
        <img src="https://cdn.pixabay.com/photo/2013/07/13/10/30/man-157378_1280.png">
    </div>

</body>
</html>
