<<<<<<< HEAD
<?php
require_once('../controller.php')?>
=======
>>>>>>> ccda2f54c5c52ca2f16d96e329793a87badc13a6
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $rank = ['1位', '2位', '3位', '4位'];
    foreach ($_SESSION['ranking'] as $i => $car) {
    echo $rank[$i] . "：" . $car . "<br>";}?><br>
    時間<?= $_SESSION['game']['time'] ?>
    <table>
    <tr>
      <td>車種</td>
      <td>スピード</td>
      <td>距離</td>
    </tr>
    <tr>
      <td>Honda</td>
      <td> <?= $_SESSION['honda']['speed']?></td>
      <td><?= $_SESSION['honda']['distance']?></td>
    </tr>
    <tr>
      <td>Nissan</td>
      <td> <?= $_SESSION['nissan']['speed']?></td>
      <td><?= $_SESSION['nissan']['distance']?></td>
    </tr>
    <tr>
      <td>Ferrari</td>
      <td> <?= $_SESSION['ferrari']['speed']?></td>
      <td><?= $_SESSION['ferrari']['distance']?></td>
    </tr>
    <tr>
      <td>Toyota</td>
      <td> <?= $_SESSION['toyota']['speed']?></td>
      <td><?= $_SESSION['toyota']['distance']?></td>
    </tr>
    </table>
    

<<<<<<< HEAD
    <form action="../controller.php" method="post">
        <input type="submit" name="start" value="スタート"><br>
        <input type="submit" name="next" value=<?= $_SESSION['game']['finish'] ? "結果画面" : "次のラウンド"  ?>>
=======
    <form action="./controller.php" method="post">
        <input type="submit" name="start" value="スタート"><br>
        <input type="submit" name="next" value=<?= $_SESSION['game']['finish'] ? "次のラウンド" : "結果画面" ?>>
>>>>>>> ccda2f54c5c52ca2f16d96e329793a87badc13a6
    </form>
</body>
</html>