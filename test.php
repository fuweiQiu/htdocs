<?php
$link = mysqli_connect('114.47.233.235:3306','user','Aa0987567499','money');
if($link){
    echo '連接成功';
}else{
    echo '連接失敗' . mysqli_connect_error();
}
?>