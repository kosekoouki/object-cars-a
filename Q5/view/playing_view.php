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
    <table>
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
    

    <form action="./controller.php" method="post">
        <input type="submit" name="start" value="スタート"><br>
        <input type="submit" name="next" value=<?= $_SESSION['game']['finish'] ? "次のラウンド" : "結果画面" ?>>
    </form>
</body>
</html>