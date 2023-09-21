<?php
session_start();
$link = mysqli_connect('localhost:3306','admin','1234','money');
if(mysqli_connect_error()){
    echo '連接失敗';
}
if(isset($_POST['send'])){
    $sql = sprintf("select * from user where username = '%s'",$_POST['username']);
    $result = mysqli_query($link,$sql);
    $num = mysqli_num_rows($result);
    if($num > 0){
        $row = mysqli_fetch_array($result,MYSQLI_BOTH);
        if($row['password'] == $_POST['password']){
            $_SESSION['username'] = $row['username'];
            $_SESSION['room'] = $row['room'];
            // header('location:log.php?event=1',true);
            header('location:index_logined.php',true);
        }else{
            echo '密碼錯誤';
            header('location:password_err.html');
        }
    }else{
        echo "無此帳號";
        header('location:account_err.php');
    }
}
?>