<?php
require_once('../controller.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= $_SESSION['game']['car']?> <br>
    <?= $message?> <br>
    <?php $rank = ['1位', '2位', '3位', '4位'];
    foreach ($_SESSION['ranking'] as $i => $car) {
    echo $rank[$i] . "：" . $car . "<br>";}?><br>
    時間<?= $_SESSION['game']['time'] ?>
    <table>
    <tr>
      <td>車種</td>
      <td>スピード</td>
      <td>距離</td>
      <td>事故回数</td>
    </tr>
    <tr>
      <td>Honda</td>
      <td> <?= round($_SESSION['honda']['speed'])*3.6?></td>
      <td><?= round($_SESSION['honda']['distance'])?></td>
      <td><?= round($_SESSION['honda']['accident_count'])?></td>
    </tr>
    <tr>
      <td>Nissan</td>
      <td> <?= round($_SESSION['nissan']['speed']*3.6)?></td>
      <td><?= round($_SESSION['nissan']['distance'])?></td>
      <td><?= round($_SESSION['nissan']['accident_count'])?></td>
    </tr>
    <tr>
      <td>Ferrari</td>
      <td> <?= round($_SESSION['ferrari']['speed']*3.6)?></td>
      <td><?= round($_SESSION['ferrari']['distance'])?></td>
      <td><?= round($_SESSION['ferrari']['accident_count'])?></td>
    </tr>
    <tr>
      <td>Toyota</td>
      <td> <?= round($_SESSION['toyota']['speed']*3.6)?></td>
      <td><?= round($_SESSION['toyota']['distance'])?></td>
      <td><?= round($_SESSION['toyota']['accident_count'])?></td>
    </tr>
    </table>
    

    <form action="../controller.php" method="post">
        <input type="submit" name="start" value="スタート"><br>
        <input type="submit" name="next" value=<?= $_SESSION['game']['finish'] ? "結果画面" : "次のラウンド"  ?>>
    </form>
</body>
</html>