<?php
function setting(){
    $_SESSION['game']=['car'=>"",'time'=>0,'round'=>1,'win_count'=>0,'money'=>0,'finish'=>false,'check_point'=>0];
    sessionReset();
}

function sessionReset(){
    $_SESSION['game']['check_point'] = 0;
    $_SESSION['game']['time'] = 0;
    $_SESSION['finish'] = false;
    $_SESSION['ranking']=['','','',''];
    $_SESSION['honda']=['name'=>'honda','price'=>0,'acceleration'=>0,'deceleration'=>0,'distance'=>0,'position'=>0,'speed'=>0,'accident_count'=>0];
    $_SESSION['nissan']=['name'=>'nissan','price'=>0,'acceleration'=>0,'deceleration'=>0,'distance'=>0,'position'=>0,'speed'=>0,'accident_count'=>0];
    $_SESSION['ferrari']=['name'=>'ferrari','price'=>0,'acceleration'=>0,'deceleration'=>0,'distance'=>0,'position'=>0,'speed'=>0,'accident_count'=>0];
    $_SESSION['toyota']=['name'=>'toyota','price'=>0,'acceleration'=>0,'deceleration'=>0,'distance'=>0,'position'=>0,'speed'=>0,'accident_count'=>0];
}
?>