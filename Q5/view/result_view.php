<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    ラウンド数：<?= $_SESSION['game']['round'] ?><br>
    勝利数：<?= $_SESSION['game']['win_count'] ?><br>
    <?= $_SESSION['game']['win_count'] == 2 ? "勝ち" : "負け" ?><br>
    <input type="submit" name="finish" value="終了">
</body>
</html>
