<?php
require_once('../controller.php')?>
<!DOCTYPE html>
<html lang="ja">
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
            position: absolute;
            right: 100px;
        }

        .container {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            align-items: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .race-map-container {
            position: relative;
            margin: 40px auto 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
        }

        .race-map {
            position: relative;
            width: 100%;
            height: 30px;
            background-color: #eee;
            border: 2px solid #444;
            margin: 0;
        }

        .car {
            position: absolute;
            top: 10px;
            width: 10px;
            text-align: center;
            font-weight: bold;
        }

        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding-top: 50px;
            color: #333;
            background-color:rgb(252, 252, 123); 
            margin: 0;              
            padding: 0;              
            width: 100vw;            
            height: 100vh;           
            overflow: hidden;
        }

        table {
            border-collapse: collapse;
            width: 40%; /* 少し小さめに */
            margin: 10px auto;
            font-family: sans-serif;
            font-size: 14px; /* 小さめの文字 */
            background-color: #f9f9f9; /* 控えめな背景色 */
        }

        th, td {
            border: 1px solid #ccc;
            padding: 6px 10px;
            text-align: center;
        }

        th {
            background-color: #eee;
            font-weight: normal;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .finish-button {
            padding: 10px 20px; 
            margin-top: 20px;           
            font-size: 10px;                
            background-color:rgb(10, 193, 65);
            color: white; 
            border: none;
            color: white;                   
            font-weight: bold;                 
            cursor: pointer;
            transition: all 0.3s ease;   
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        } 
    </style>
</head>   
<body>
     <!-- マップ -->
    <div class="race-map-container">
        <div class="label start">スタート</div>
        <div class="label goal">ゴール</div>
        <div class="container">
            <div>Honda</div>
            <div class="race-map">
                <div class="car" id="honda">🚙</div>
            </div>
        </div>
        <div class="container">
            <div>Nissan</div>
            <div class="race-map">
                <div class="car" id="nissan">🛻</div>
            </div>
        </div>
        <div class="container">
            <div>Ferrari</div>
            <div class="race-map">
                <div class="car" id="ferrari">🏎️</div>
            </div>
        </div>
        <div class="container">
            <div>Toyota</div>
            <div class="race-map">
                <div class="car" id="toyota">🚗</div>
            </div>
        </div>
    </div>


    <div class="result-summary">
        <p class="car-title">🚗選んだ車種： <?= $_SESSION['game']['car']?> <br>
            <span style="background-color: red; color: white;"><?= $message ?></span><br>
        </p>

        <div class="ranking">
            <p class="rank-title"><strong>🏁現在の順位：</strong>
            <span class="ranking">
                1位<span id="one"></span>
                2位<span id="two"></span>
                3位<span id="three"></span>
                4位<span id="four"></span>
            </span>
            <br>
        </div> 

        <p class="time">🕓タイム：<span id="time"><?= $_SESSION['game']['time'] ?>秒</span></p>
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
            <td id="honda_speed"> <?= round($_SESSION['honda']['speed'])*3.6?></td>
            <td id="honda_distance"><?= round($_SESSION['honda']['distance'])?></td>
            <td id="honda_accident"><?= round($_SESSION['honda']['accident_count'])?></td>
        </tr>
        <tr>
            <td>Nissan</td>
            <td id="nissan_speed"> <?= round($_SESSION['nissan']['speed']*3.6)?></td>
            <td id="nissan_distance"><?= round($_SESSION['nissan']['distance'])?></td>
            <td id="nissan_accident"><?= round($_SESSION['nissan']['accident_count'])?></td>
        </tr>
        <tr>
            <td>Ferrari</td>
            <td id="ferrari_speed"> <?= round($_SESSION['ferrari']['speed']*3.6)?></td>
            <td id="ferrari_distance"><?= round($_SESSION['ferrari']['distance'])?></td>
            <td id="ferrari_accident"><?= round($_SESSION['ferrari']['accident_count'])?></td>
        </tr>
        <tr>
            <td>Toyota</td>
            <td id="toyota_speed"><?= round($_SESSION['toyota']['speed']*3.6)?></td>
            <td id="toyota_distance"><?= round($_SESSION['toyota']['distance'])?></td>
            <td id="toyota_accident"><?= round($_SESSION['toyota']['accident_count'])?></td>
        </tr>
    </table>

    <button class="finish-button" id="start" >スタート</button>
    <form action="../controller.php" method="post">
        <input class="finish-button" type="submit" name="next" value=<?= $_SESSION['finish'] ? "結果画面" : "次のラウンド"  ?>>
    </form>
</body>
</html>


<script>
    let timer = null;
    async function updateRace(){
        const response = await fetch("../game.php",{
            method:"POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body:"start=1"
            });
            const data = await response.json();
            document.getElementById("time").textContent = data.time + "秒";

            document.getElementById("honda").style.left = data.car.honda.position + "%";
            document.getElementById("nissan").style.left = data.car.nissan.position + "%";
            document.getElementById("ferrari").style.left = data.car.ferrari.position + "%";
            document.getElementById("toyota").style.left = data.car.toyota.position + "%";

            document.getElementById("honda_speed").textContent = Math.round(data.car.honda.speed*3.6) + "km/h";
            document.getElementById("nissan_speed").textContent = Math.round(data.car.nissan.speed*3.6) + "km/h";
            document.getElementById("ferrari_speed").textContent = Math.round(data.car.ferrari.speed*3.6) + "km/h";
            document.getElementById("toyota_speed").textContent = Math.round(data.car.toyota.speed*3.6) + "km/h";

            document.getElementById("honda_distance").textContent = Math.round(data.car.honda.distance) + "m";
            document.getElementById("nissan_distance").textContent = Math.round(data.car.nissan.distance) + "m";
            document.getElementById("ferrari_distance").textContent = Math.round(data.car.ferrari.distance) + "m";
            document.getElementById("toyota_distance").textContent = Math.round(data.car.toyota.distance) + "m";

            document.getElementById("honda_accident").textContent = data.car.honda.accident_count + "回";
            document.getElementById("nissan_accident").textContent = data.car.nissan.accident_count + "回";
            document.getElementById("ferrari_accident").textContent = data.car.ferrari.accident_count + "回";
            document.getElementById("toyota_accident").textContent = data.car.toyota.accident_count + "回";

            document.getElementById("one").textContent = data.ranking[0] ;
            document.getElementById("two").textContent = data.ranking[1] ;
            document.getElementById("three").textContent = data.ranking[2] ;
            document.getElementById("four").textContent = data.ranking[3] ;

            if(data.finish){
                clearInterval(timer);
                timer = null;
            }
    }

    document.getElementById("start").addEventListener("click",() => {
        if(!timer){
            timer =  setInterval(updateRace,100) ;
        }
    })
</script>