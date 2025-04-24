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
            background: #ff1414;
        }

        .main-image {
            max-width: 80%;
            height: auto;
            margin-bottom: 30px;
            border: 5px;
            border-radius: 10px;
        }
        h1 {
            text-align: center;  
            margin-bottom: 20px; 
            font-size: 4em;
            color: white;
            
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
<img src="https://thumb.ac-illust.com/65/65e5ff760d2273a88a933c6033f81920_t.jpeg" alt="カーズ" class="main-image">
    <h1> レース！</h1>
    <form action="../controller.php" method="post">
        <button type="submit" name="first">🚘ゲームスタート🚘</button>
    </form>
</body>
</html>
