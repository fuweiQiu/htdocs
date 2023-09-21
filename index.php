<?php
if(isset($_GET['noAccount'])){ ?>
    <script>alert('帳號錯誤')</script>
<?php }elseif(isset($_GET['loginFirst'])){?>
    <script>alert('請先登入')</script>
<?php }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記帳系統登入</title>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-3.6.4.js"></script>
    <script src="js/chart.umd.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center text-center">
            <h1>記帳系統登入</h1>
        </div>
        <div class="row justify-content-center text-center">
            <form action="login2.php" method="post" class="justify-content-center text-center col-6">
                <table class="justify-content-center text-center table">
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>帳號</td>
                        <td><input type="text" name="username" class="form-control" placeholder="請輸入帳號"></td>
                    </tr>
                    <tr>
                        <td>密碼</td>
                        <td><input type="password" name="password" class="form-control" placeholder="請輸入密碼"></td>
                    </tr>
                </table>
                <input type="submit" name="send" value="登入" class="btn btn-primary">
            </form>
        </div>
    </div>    
</body>
</html>