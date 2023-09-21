<?php
$link = mysqli_connect('localhost','admin','1234','web54'); //先在本機建好使用者admin 密碼1234 資料庫web54
$sql = 'select * from users'; // 要有資料表users
$result = mysqli_query($link, $sql); //用上面的$sql進行查詢
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <?php while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)){ //逐筆查詢users中的資料?>
        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['password']?></td>
            <td><?php echo $row['level']?></td>
        </tr>
        <?php }?>
    </table>
</body>
</html>