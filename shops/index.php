<?php
$link = mysqli_connect('localhost','admin','1234','shops');
mysqli_set_charset($link, 'UTF8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>登入</title>
    <style>
        html, body{
            background-color: #212121;
        }
        .input-group {
    position: relative;
    }

    .input {
    border: solid 1.5px #9e9e9e;
    border-radius: 1rem;
    background: none;
    padding: 1rem;
    font-size: 1rem;
    color: #f5f5f5;
    transition: border 150ms cubic-bezier(0.4,0,0.2,1);
    }

    .user-label {
    position: absolute;
    left: 15px;
    color: #e8e8e8;
    pointer-events: none;
    transform: translateY(1rem);
    transition: 150ms cubic-bezier(0.4,0,0.2,1);
    }

    .input:focus, input:valid {
    outline: none;
    border: 1.5px solid #1a73e8;
    }

    .input:focus ~ label, input:valid ~ label {
    transform: translateY(-50%) scale(0.8);
    background-color: #212121;
    padding: 0 .2em;
    color: #2196f3;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1 style="color: white;">登入</h1>
        </div>
        <div class="row">
            <form action="index.php">
                <div class="input-group">
                    <input required="" type="text" name="text" autocomplete="off" class="input">
                    <label class="user-label">First Name</label>
                  </div>
            </form>
        </div>
    </div>
</body>
</html>