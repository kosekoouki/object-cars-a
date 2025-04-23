<?PHP
require_once("../controller.php")
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>設定画面</title>
</head>

<body>
</table>
    ラウンド数：<?= $_SESSION['game']['round']?> 回<br>
    勝利数：<?= $_SESSION['game']['win_count']?> 回<br>
    所持金：<?= $_SESSION['game']['money']?> 万円<br>

    <form action="../controller.php" method="post">
    <p>車種を選択してください：</p>
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