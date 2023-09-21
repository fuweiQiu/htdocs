<?php
$link = mysqli_connect('localhost','admin','1234','money');
if(mysqli_connect_error()){
    echo "Error :".mysqli_connect_error();
}
$sql = 'select * from user';
$result = mysqli_query($link,$sql);
echo $result
?>