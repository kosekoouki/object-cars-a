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
            max-width: 500px;
            height: auto;
            margin-bottom: 20px;
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
<img src="https://sdmntprwestus.oaiusercontent.com/files/00000000-3964-6230-ab4f-a2d90caee50e/raw?se=2025-04-24T05%3A09%3A31Z&sp=r&sv=2024-08-04&sr=b&scid=c853af93-4ebc-5168-be17-7a6afc202bd7&skoid=acefdf70-07fd-4bd5-a167-a4a9b137d163&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2025-04-24T01%3A18%3A12Z&ske=2025-04-25T01%3A18%3A12Z&sks=b&skv=2024-08-04&sig=ADVXDWgyWTX1AmZTe4Qzxv45jzK9Q4VHxASauXIjZn8%3D" alt="カーズ" class="main-image">
    <h1>スピードレース・ダービー</h1>
    <form action="../controller.php" method="post">
        <button type="submit" name="first">🚘ゲームスタート🚘</button>
    </form>
</body>
</html>
