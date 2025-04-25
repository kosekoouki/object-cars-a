<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スタート画面</title>
    <style>
        /* ボディ全体のスタイル */
        body {
            display: flex;
            flex-direction: column; 
            justify-content: center; 
            align-items: center;     
            height: 100vh;           
            margin: 0;               
            font-family: Arial, sans-serif;
            background:rgb(225, 89, 51);
        }

        .main-image {
            width: 80%;
            max-width: 600px;
            height: auto;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        h1 {
            color:rgb(67, 4, 32);
            text-align: center;
            margin-bottom: 20px;
            font-size: 3.5em;
            text-shadow: 2px 2px 8px rgba(7, 91, 234, 0.6);
        }

        form {
            text-align: center; 
        }

        button {
            padding: 20px 50px;
            font-size: 20px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <img src="../img/race_start.png" alt="カーズ" class="main-image">

    <h1>スピードレース・ダービー</h1>
    <form action="../controller.php" method="post">
        <button type="submit" name="first">🚘ゲームスタート🚘</button>
    </form>
</body>
</html>
