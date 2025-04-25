<?PHP require_once("../controller.php") ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>設定画面</title>
    <style>
        body {
            font-family: Arial,sans-serif;
            text-align: center;
            padding: 20px;
            background-color: #f4f4f9;
        }

        h1{
            text-align: center;
        }

        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .game-info{
            text-align: center;
            margin-bottom: 20px;
        }

        .game-info .highlight {
            font-size: 24px;
            color: #ff1414; 
            font-weight: bold;
        }

        label{
            margin: 10px;
            display: block;
        }

        button{
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .car-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .car-card{
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            width: 180px;
            height: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box;
            transition: transform 0.2s;
        }
        
        .car-img {
            width: 100%;
            height: 200px; 
            object-fit: contain;
            object-position: center center;
            margin-bottom: 5px;
        }

        .player{
            margin:0px
        }

        .players{
            margin-left:20px;
            margin-right:20px;
        }
    </style>        
</head>
<body>
    <h1>車種選択画面</h1>
    <div class="game-info">
        <p><strong>ラウンド数：</strong><span class="highlight"><?= $_SESSION['game']['round'] ?></span> 回</p>
        <p>
            <strong>勝利数</strong><span class="players">プレイヤー１：<span class="highlight"><?= $_SESSION['game']['win_count_1'] ?></span> 回</span>
            プレイヤー２：<span class="highlight"><?= $_SESSION['game']['win_count_2'] ?></span> 回
        </p>
        <p>
            <strong>所持金</strong><span class="players">プレイヤー１：<span class="highlight"><?= $_SESSION['game']['money_1'] ?></span> 万円</span>
            プレイヤー２：</strong><span class="highlight"><?= $_SESSION['game']['money_2'] ?></span> 万円
        </p>
        
        <?php if (!empty($message)): ?>
            <p class="error"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>


    </div>
    <form action="../controller.php" method="post">
        <div class="car-container">
            <label class="car-card">
                <img src="https://cdn.pixabay.com/photo/2016/11/23/08/13/honda-1852200_1280.jpg" alt="Honda" class="car-img">
                Honda：<?= $_SESSION['honda']['price']?> 万円<br>
                <label class="player">プレイヤー１<input type="radio" name="car_1" value="honda"></label> 
                <label class="player">プレイヤー２<input type="radio" name="car_2" value="honda"></label>
            </label>
            <label class="car-card">
                <img src="https://cdn.pixabay.com/photo/2022/07/15/19/00/auto-7323835_1280.png" alt="nissan" class="car-img">
                Nissan：<?= $_SESSION['nissan']['price']?> 万円<br>
                <label class="player">プレイヤー１<input type="radio" name="car_1" value="nissan"></label> 
                <label class="player">プレイヤー２<input type="radio" name="car_2" value="nissan"></label>
            </label>
            
            <label class="car-card">
                <img src="https://cdn.pixabay.com/photo/2017/02/01/11/20/drive-2029742_1280.png" alt="ferrari" class="car-img">
                Ferrari：<?= $_SESSION['ferrari']['price']?> 万円<br>
                <label class="player">プレイヤー１<input type="radio" name="car_1" value="ferrari"></label> 
                <label class="player">プレイヤー２<input type="radio" name="car_2" value="ferrari"></label> 
            </label>

            <label class="car-card">
                <img src="https://cdn.pixabay.com/photo/2017/06/15/04/13/car-2404064_1280.png" alt="toyota" class="car-img">
                Toyota：<?= $_SESSION['toyota']['price']?> 万円<br>
                <label class="player">プレイヤー１<input type="radio" name="car_1" value="toyota"></label> 
                <label class="player">プレイヤー２<input type="radio" name="car_2" value="toyota"></label> 
            </label>

        </div>
        <br>
        <button type="submit" name="setting">スタート</button>
    </form>  
</body>
</html>