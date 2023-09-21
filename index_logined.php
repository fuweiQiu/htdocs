<?php
session_start();
if(isset($_SESSION['username'])){
}else{
    header('location:index.php?loginFirst');
};?>
<script>
    let allMoney = 'https://ap10.ragic.com/bookKeepingSpecialTopic/forms/6?api&APIKey=UHY4YmRrM1Q3SkxXSS94OU05Q3R1MzlTS0hPdm1YM1Z2QklJUmZFL3RMZmlIelZxYUFDallxRWlaTnFRNUtqaA==';
    let users = 'https://ap10.ragic.com/bookKeepingSpecialTopic/forms/4?api&APIKey=UHY4YmRrM1Q3SkxXSS94OU05Q3R1MzlTS0hPdm1YM1Z2QklJUmZFL3RMZmlIelZxYUFDallxRWlaTnFRNUtqaA==&listing'
    let trade = 'https://ap10.ragic.com/bookKeepingSpecialTopic2/forms/5?api&APIKey=UHY4YmRrM1Q3SkxUUHJZYVF3VmVxd2ZhOFE1M1dWWlpad2FrQmRjaEt3WFBWOWg1QmhDcTloSlllWG8yaDJqRA==&listing';
    fetch(users)
        .then(res => {
            return res.json();
        })
        .then(userData => {
            
        })
</script>
<!-- 
// $link = mysqli_connect('localhost','admin','1234','money'); 連線資料庫
// $sql = sprintf("select * from user where username = '%s'",$_SESSION['username']); //找user 資料表user
// $sql_2 = sprintf("select * from all_money where room = '%s'",$_SESSION['room']); //找總額 資料表all_money
// $sql_3 = sprintf("select * from trade where room = '%s' order by id DESC",$_SESSION['room']) //資料表trade 記錄用
// $result = mysqli_query($link,$sql);
// $result_2 = mysqli_query($link,$sql_2);
// $result_3 = mysqli_query($link,$sql_3);
// $row = mysqli_fetch_array($result,MYSQLI_BOTH);
// $row_2 = mysqli_fetch_array($result_2,MYSQLI_BOTH); 
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記帳系統大廳</title>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-3.6.4.js"></script>
    <script src="js/chart.umd.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center text-center">
            <h1>記帳系統大廳</h1>
        </div>
        <div id="profile">
            <div id="photo_area">
                <img src="<?php echo $row['photo']?>" alt="" class="profile_photo">
            </div>
            <div id="content">
                <h3 style="font-weight:bold;"><?php echo $row['username']?></h3>
                <!-- 使用者名稱 房間 自介 -->
                <span>所在房間：<?php echo $row['room']?></span>
                <span class="self_intro">
                    <?php echo $row['intro']?>
                </span>
                <div style="float:left;margin-bottom:100px">
                    <a href="logout.php" class="btn btn-primary btn-lg edit_btn_class" style="margin-top: 70px">登出</a>
                    <a href="profile_edit.php?username=<?php echo $row['username']?>" class="btn btn-lg btn-warning edit_btn_class" style="margin-top: 5px">修改個人資料</a>
                </div>
            </div>
        </div>
        <div class="money_area">
            <div class="btn-group btn_group_add" role="group">
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#new_income">新增收入</button>
                <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#new_expen">新增支出</button>
            </div>
            <div class="all_money">
                <div style="font-size:25px">目前總額</div>
                <table class="amount_table">
                    <tr>
                        <td class="all_money_child">收入</td>
                        <td class="all_money_child">支出</td>
                    </tr>
                    <tr>
                        <td class="all_amount" style="color:#FF6384"><?php echo $row_2['income']?></td>
                        <td class="all_amount" style="color:#36A2EB"><?php echo $row_2['expen']?></td>
                    </tr>
                </table>
                <canvas id="new_chart" class="amount_chart"></canvas>
            </div>
            <script>
                var data = {
                    labels: ['收入', '支出'],
                    datasets: [{
                        label: '收入',
                        data: [<?php echo $row_2['income']?>,<?php echo $row_2['expen']?>],
                        backgroundColor: ['#FF6384', '#36A2EB']
                    }]
                };
                var options = {
                    responsive:true
                };
                var ctx = document.getElementById('new_chart').getContext('2d');
                var new_chart = new Chart(ctx,{
                    type:'pie',
                    data:data,
                    options:options
                });
            </script>
            <div class="add_list">
                <table class="table table-hover">
                    <tr>
                        <td>類別</td>
                        <td>說明</td>
                        <td>金額</td>
                        <td>時間</td>
                        <td>操作</td>
                    </tr>
                    <?php while($row_3 = mysqli_fetch_array($result_3,MYSQLI_BOTH)){
                        // if(($num_3 = mysqli_num_rows($result_3) < 10)){
                    ?>
                        <tr onclick="window.location.href = 'trade_detail.php?id=<?php echo $row_3['id']?>'">
                            <td>
                                <?php
                                switch ($row_3['type']) {
                                    case 'salary':
                                        echo '薪水';
                                        break;
                                    case 'food':
                                        echo '飲食';
                                        break;
                                    case 'livecost':
                                        echo '生活費';
                                        break;
                                    case 'other':
                                        echo '其他';
                                        break;
                                    case 'play':
                                        echo '娛樂';
                                        break;
                                    case 'house':
                                        echo '房租/房貸';
                                        break;
                                    default:
                                        echo $row_3['type'];
                                        break;
                                }
                                ?>
                            </td>
                            <td><?php echo $row_3['title']?></td>
                            <td><?php echo $row_3['amount']?></td>
                            <td><?php echo $row_3['time']?></td>
                            <td><?php echo $row_3['action']?></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
            <!-- 新增收入modal -->
            <div class="modal" tabindex="-1" id="new_income">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">新增收入</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="new_income.php" method="POST">
                            <div class="modal-body">
                                    類別：
                                    <select name="type" id="type" class="form-control" style="margin-bottom:50px">
                                        <option value="salary">薪水</option>
                                        <option value="livecost">生活費</option>
                                        <option value="other">其他</option>
                                    </select>
                                    說明:
                                    <input type="text" name="title" class="form-control" style="margin-bottom:50px;">
                                    金額：
                                    <input type="number" name="amount" class="form-control" placeholder="請輸入金額">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                                <input type="submit" name="send_income" class="btn btn-primary" value="新增">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- 新增收入modal -->
            <!-- 新增支出modal -->
            <div class="modal" tabindex="-1" id="new_expen">
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
            </div>
            <!-- 新增支出modal -->
        </div>
    </div>    
</body>
</html>