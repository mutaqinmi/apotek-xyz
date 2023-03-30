<?php
require "functions.php";

if(isset($_POST["login"])){
    login($_POST);
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Log In | Apotek XYZ</title>
</head>
<body>
    <div class="custser">
        <span>Pusat Bantuan</span>
        <img src="img/support.png" alt="">
    </div>
    <div class="wrapper">
        <div class="logo">
            <img src="img/medicine.png" alt="">
            <h1>Apotek XYZ</h1>
        </div>
        <div class="loginform">
            <h2>Log In</h2>
            <form method="post">
                <div class="username">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username ..." required>
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password ..." required>
                    <div class="menu">
                        <div class="show">
                            <input type="checkbox" name="show" id="show">
                            <label for="show">Tampilkan password</label>
                        </div>
                        <div class="forget">
                            <a href="#">Lupa password?</a>
                        </div>
                    </div>
                </div>
                <button type="submit" name="login" class="login">Log In</button>
            </form>
        </div>
    </div>

    <script src="script/login.js"></script>
</body>
</html>