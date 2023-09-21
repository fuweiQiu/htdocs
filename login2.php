<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
// echo $username;
// echo $password;
?>
<script>
    function loginFun(username, password, userData){
        for(let index in userData){
            if(userData[index].username == username){
                if(userData[index].password == password){
                    <?php
                    $_SESSION['username'] = $username;
                    header('location:index_logined.php');
                    ?>
                    return 'login'
                }else{
                    window.location.replace('./password_err.html');
                    return 'password wrong'
                }
            }
        }
        window.location.replace('./index.php?noAccount');
        return 'account wrong';
    }
    let url = 'https://ap10.ragic.com/bookKeepingSpecialTopic/forms/4?api&APIKey=UHY4YmRrM1Q3SkxXSS94OU05Q3R1MzlTS0hPdm1YM1Z2QklJUmZFL3RMZmlIelZxYUFDallxRWlaTnFRNUtqaA==&listing';
    let username = '<?php echo $username?>';
    let password = '<?php echo $password?>';
    // console.log(username);
    fetch(url)
        .then(res => {
            return res.json();
        })
        .then(data => {
            console.log(data);
            loginFun(username, password, data);
        })
</script>