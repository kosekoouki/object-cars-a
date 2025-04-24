<?php
require_once('../controller.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .label {
            position: absolute;
            top: 10px;
            font-weight: bold;
        }

        .start {
            left: 100px;
        }

        .goal {
            right: 10px;
        }
        .container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            align-items: center;
        }
        .race-map-container {
            position: relative;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
}
        .race-map {
            position: relative;
            width: 90%;
            max-width: 1000px;
            height: 30px;
            background-color: #eee;
            border: 2px solid #444;
            position: relative;
            margin: 0 50px;
        }

        .car {
            position: absolute;
            top: 10px;
            width: 10px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?= $_SESSION['game']['car']?> <br>
    <?= $message?> <br>
    <?php $rank = ['1位', '2位', '3位', '4位'];
    foreach ($_SESSION['ranking'] as $i => $car) {
    echo $rank[$i] . "：" . $car . "<br>";}?><br>
    時間<?= $_SESSION['game']['time'] ?>

    <!-- マップ -->
    

<div class="race-map-container">
    <div class="label start">スタート</div>
    <div class="label goal">ゴール</div>
    <div class="container">
        <div>Honda</div>
        <div class="race-map">
            <div class="car" style="left: <?=$_SESSION['honda']['position']?>%;">🚗</div>
        </div>
    </div>
    <div class="container">
        <div>Nissan</div>
        <div class="race-map">
            <div class="car" style="left: <?=$_SESSION['nissan']['position']?>%;">🚗</div>
        </div>
    </div>
    <div class="container">
        <div>Ferrari</div>
        <div class="race-map">
            <div class="car" style="left: <?=$_SESSION['ferrari']['position']?>%;">🚗</div>
        </div>
    </div>
    <div class="container">
        <div>Toyota</div>
        <div class="race-map">
            <div class="car" style="left: <?=$_SESSION['toyota']['position']?>%;">🚗</div>
        </div>
    </div>
</div>


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