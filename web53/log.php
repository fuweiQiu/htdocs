<?php
session_start();
$link = mysqli_connect('localhost','admin','1234','web53');
//mysqli_set_charset($link, 'UTF8');
if(isset($_GET['status'])){
    if($_GET['status'] == 0){
        echo '登入驗證失敗';
    }elseif ($_GET['status'] == 1){
        echo '登入驗證成功';
    }else{
        echo '未知錯誤';
    }
}
?>
