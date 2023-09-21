<?php
session_start();
$link = mysqli_connect('localhost','admin','1234','money');
$sql = sprintf("select * from user where username = '%s'",$_SESSION['username']); //找user
// $sql_2 = sprintf("select * from all_money where room = '%s'",$_SESSION['room']); //找總額
// $sql_3 = sprintf("select * from trade where room = '%s'",$_SESSION['room']);
$result = mysqli_query($link,$sql);
// $result_2 = mysqli_query($link,$sql_2);
// $result_3 = mysqli_query($link,$sql_3);
$row = mysqli_fetch_array($result,MYSQLI_BOTH);
// $row_2 = mysqli_fetch_array($result_2,MYSQLI_BOTH);
// if(!empty($_FILES)){
//     header('access-control-allow-origin:*');
//     $filename = 'image/'.$_FILES['file']['name'];
//     move_uploaded_file($_FILES['file']['tmp_name'],$filename);
// }
if(isset($_POST['send'])){
    $sql_2 = sprintf("update user set username = '%s',password = '%s',intro = '%s' where id = '%s'",$_POST['username'],$_POST['password'],$_POST['intro'],$row['id']);
    // echo $sql_2;
    $result_2 = mysqli_query($link,$sql_2);
    $href = 'location:profile_edit.php?username='.$_SESSION['username'];
    header($href);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改個人資料</title>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-3.6.4.js"></script>
    <script src="js/chart.umd.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center text-center">
            <h1>修改個人資料</h1>
        </div>
        <div id="profile">
            <div id="photo_area">
                <img src="<?php echo $row['photo']?>" alt="" class="profile_photo">
            </div>
            <div id="content">
                <h3 style="font-weight:bold;"><?php echo $row['username']?></h3>
                <span>所在房間：<?php echo $row['room']?></span>
                <span class="self_intro">
                    <?php echo $row['intro']?>
                </span>
                <div style="float:left;margin-bottom:100px">
                    <a href="index_logined.php" class="btn btn-lg btn-info edit_btn_class" style="margin-top:70px;">回到大廳</a>
                    <input type="submit" class="btn btn-lg btn-warning edit_btn_class" style="margin-top:5px;" form="edit_data" value="儲存修改" name="send">
                </div>
            </div>
        </div>
        <div class="money_area" id="edit_div">
            <form action="profile_edit.php?username=<?php echo $_SESSION['username']?>" id="edit_data" enctype="multipart/form-data" name="edit_data" method="POST">
                名稱
                <input type="text" class="form-control" value="<?php echo $row['username']?>" name="username">
                密碼
                <input type="password" class="form-control" value="<?php echo $row['password']?>" name="password" id="password">
                自我介紹
                <input type="text" class="form-control" value="<?php echo $row['intro']?>" name="intro">
                個人圖片<strong style="color:red">不好意思，更改圖片暫不支援</strong>
                <input type="file" name="file" class="form-control" id="file" disabled>
            </form>
        </div>
        <script>
            $(document).ready(function(){
                $('#password').click(function(){
                    this.attr('type','text')
                })
            })
        </script>
        <!-- <div style="text-align:center"> -->
            <!-- <img src="<?php echo $row['photo']?>" alt="圖片預覽" class="profile_photo" id="photo_pre"> -->
            <!-- <script>
                $(document).ready(function(){
                    $('#file').change(function){
                        const file = this.files[0];
                        if(file){
                            let reader = new FileReader();
                            reader.onload = function(event){
                                $('#photo_pre').attr('src',event.target.result);
                            }
                            reader.readAsDataURL(file);
                        }
                    });
                });
            </script> -->
        <!-- </div>  -->
    </div>
    <!-- <div class="modal" tabindex="-1" id="new_expen">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">新增支出</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="new_expen.php" method="POST">
                <div class="modal-body">
                        類別：
                        <select name="type" id="type" class="form-control" style="margin-bottom:50px">
                            <option value="food">飲食</option>
                            <option value="play">娛樂</option>
                            <option value="house">房租/房貸</option>
                            <option value="other">其他</option>
                        </select>
                        說明:
                        <input type="text" name="title" class="form-control" style="margin-bottom:50px;">
                        金額：
                        <input type="number" name="amount" class="form-control" placeholder="請輸入金額">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <input type="submit" name="send_expen" value="確定新增" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>     -->
</body>
</html>