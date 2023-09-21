<?php
session_start();
$link = mysqli_connect('localhost','web53','1234','web53');
if(isset($_POST['submit'])){
    $msg = '';
    if($_POST['username'] == '')$msg .= '帳號為空';
    if($_POST['password'] == '')$msg .= '密碼為空';
    if($_POST['username'] != '' && $_POST['password'] != ''){
        $sql = sprintf("select * from users where username = '%s'", $_POST['username']);
        $result = mysqli_query($link, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0){
            $row = mysqli_fetch_array($result, MYSQLI_BOTH);
            if($_POST['password'] == $row['password']){
                $_SESSION['username'] = $row['username'];
                $_SESSION['level'] = $row['level'];
                header('location:ver.php');
            }else{
                $msg = $msg.'密碼錯誤';
            }
        }else{
            $msg = $msg.'帳號錯誤';
        }
    }
    echo "<script>alert('".$msg."')</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登入</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function (){
            $('#change').click(function (){
                $('#cap_img').attr('src', './cap.php');
            })
        })
    </script>
</head>
<body>
    <div class="container text-center justify-content-center">
        <div class="row justify-content-center">
            <h1>咖啡商品展示系統</h1>
        </div>
        <div class="row justify-content-center">
            <form action="index.php" method="post">
                <table class="text-center justify-content-center table">
                    <tr>
                        <td>帳號</td>
                        <td><input type="text" name="username" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>密碼</td>
                        <td><input type="password" name="password" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>驗證碼</td>
                        <td>
                            <img src="./cap.php" alt="" id="cap_img">
                            <input type="button" id="change" class="btn btn-primary" value="重新產生">
                        </td>
                    </tr>
                    <tr>
                        <td>由大到小排列</td>
                        <td><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="reset" value="清除" class="btn btn-danger">
                            <input type="submit" name="submit" class="btn btn-primary" value="登入">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>