<?php
session_start();
if(isset($_SESSION['username'])){

}else{
    header('location:index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>驗證</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        table{
            border-collapse: collapse;
        }
        td{
            width: 200px;
            height: 120px;
            border: 1px solid black ;
        }
        .bg-y{
            background-color: yellow;
        }
    </style>
    <script>
        $(document).ready(function (){
            $('td').click(function (){
                $(this).toggleClass('bg-y');
            })
            $('#check_btn').click(function (){
                captcha();
            })
        })
        function captcha(){
            let status = false;
            const new_array = $('td');
            const currentColor = 'rgb(255, 255, 0)';
            if(new_array[0].css('background-color') === new_array[1].css('background-color')){
                status = true;
            }
            else if(new_array[0].css('background-color') === new_array[2].css('background-color')){
                status = true;
            }
            else if(new_array[1].css('background-color') === new_array[3].css('background-color')){
                status = true;
            }
            else if(new_array[2].css('background-color') === new_array[3].css('background-color')){
                status = true;
            }
            if (status == true){
                window.location.replace('log.php?status=1');
            }else{
                window.location.replace('log.php?status=0');
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-center text-center">
            <h1>二階驗證</h1>
        </div>
        <div class="row justify-content-center text-center">
            <table>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="row justify-content-center text-center">
            <button class="btn btn-primary" id="check_btn">驗證並登入</button>
        </div>
    </div>
</body>
</html>