<?php
$link = mysqli_connect('localhost','admin','1234','money');
if(mysqli_connect_error()){
    echo 'error';
}
$sql = 'select * from trade';
echo $sql;
$result = mysqli_query($link,$sql);
// $row = mysqli_fetch_array($result,MYSQLI_BOTH);
$arr = Array();
$num = 1;
$row = mysqli_fetch_array($result,MYSQLI_BOTH);
?>