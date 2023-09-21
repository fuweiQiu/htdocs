<?php
session_start();
$link = mysqli_connect('localhost','admin','1234','money');
if(mysqli_connect_error()){
    echo '連接失敗';
}
if($_GET['event'] == 1){
    $sql = sprintf("insert into log values(null,'%s',NOW(),'login')",$_SESSION['username']);
    $result = mysqli_query($link,$result);
    header('location:index_logined.php',true);
}else if($_GET['event'] == 2){
    $sql = sprintf("insert into log values(null,'%s',NOW(),logout)",$_SESSION['username']);
    $result = mysqli_query($link,$result);
    header('location:index.php',true);
}
?>