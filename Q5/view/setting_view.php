<?PHP
require_once("../controller.php")
?>
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
            color: #ff14d8; 
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
        </style>
        
</head>

<body>
<h1>車種選択画面</h1>

<div class="game-info">
    <p><strong>ラウンド数：</strong><span class="highlight"><?= $_SESSION['game']['round'] ?></span> 回</p>
    <p><strong>勝利数：</strong><span class="highlight"><?= $_SESSION['game']['win_count'] ?></span> 回</p>
    <p><strong>所持金：</strong><span class="highlight"><?= $_SESSION['game']['money'] ?></span> 万円</p>
    
<?php if (!empty($message)): ?>
    <p class="error"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p>
<?php endif; ?>


</div>
</table>
    <form action="../controller.php" method="post">

    <label>
        Honda：<?= $_SESSION['honda']['price']?> 万円
        <input type="radio" name="car" value="honda"> 
    </label><br>
    <label>
        Nissan：<?= $_SESSION['nissan']['price']?> 万円
        <input type="radio" name="car" value="nissan"> 
    </label><br>
    <label>
        Ferrari：<?= $_SESSION['ferrari']['price']?> 万円
        <input type="radio" name="car" value="ferrari"> 
    </label><br>
    <label>
         Toyota：<?= $_SESSION['toyota']['price']?> 万円
        <input type="radio" name="car" value="toyota"> 
    </label><br><br>
    <button type="submit" name="setting">スタート</button>
    </form>  
</body>
</html>