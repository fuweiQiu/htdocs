<?php
session_start();
$link = mysqli_connect('localhost:3306','admin','1234','money');
if(isset($_POST['submit'])){
    $error = '';
    $username = $_POST['username'];
    $sql = sprintf("select * from user where username = '%s'", $username);
    $result = mysqli_query($link,$sql);
    $row_num = mysqli_num_rows($result);
    if ($row_num != 0){
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        $password = $_POST['password'];
        $db_password = $row['password'];
        if($password == $db_password){
            $_SESSION['username'] = $row['username'];
            $_SESSION['room'] = $row['room'];
            header('location:index.php');
        }else{
            $error = '密碼錯誤';
        }
    }else{
        $error = '帳號錯誤';
    }
    echo '<script>alert("'.$error.'")</script>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="login.php" method="post">
                <table class="table text-center">
                    <tr>
                        <td>帳號</td>
                        <td><input type="text" name="username" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>密碼</td>
                        <td><input type="password" name="password" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-primary" name="submit" value="送出">
                            <input type="reset" value="清除" class="btn btn-danger">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
