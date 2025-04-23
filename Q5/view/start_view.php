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
            background: #ff4500;
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
            padding: 10px 20px; 
            font-size: 16px;   
        }
    </style>
</head>
<body>
    <h1> カーズ！</h1>
    <form action="../controller.php" method="post">
        <button type="submit" name="first">ゲームスタート</button>
    </form>
</body>
</html>
