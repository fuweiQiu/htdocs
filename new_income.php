<?php
session_start();
$link = mysqli_connect('localhost','admin','1234','money');
if(isset($_POST['send_income'])){
    $sql_1 = sprintf("INSERT INTO income VALUES (null,'%s','%s',NOW(),'%s','%s')",$_POST['type'],$_POST['title'],$_POST['amount'],$_SESSION['room']);
    $sql_2 = sprintf("INSERT INTO trade VALUES ('%s','%s',NOW(),'%s','收入','%s',null)",$_POST['type'],$_POST['title'],$_POST['amount'],$_SESSION['room']);
    $sql_3 = sprintf("update all_money set income = income + '%s' where room = '%s'",$_POST['amount'],$_SESSION['room']);
    // echo $sql_1;
    // echo $sql_2;
    // echo $sql_3;
    $result_1 = mysqli_query($link,$sql_1);
    $result_2 = mysqli_query($link,$sql_2);
    $result_3 = mysqli_query($link,$sql_3);
    header('location:index_logined.php',true);
}
?>