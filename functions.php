<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "apotek_xyz";

$conn = mysqli_connect($server, $user, $password, $database);

function login($data){
    global $conn;
    $username = $data["username"];
    $password = $data["password"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username'");
    if(mysqli_num_rows($result) === 1){
        $user = mysqli_fetch_assoc($result);
        if($password == $user["password"]){
            if($user["tipe_user"] == "admin"){
                mysqli_query($conn, "INSERT INTO tbl_log(waktu, aktifitas, id_user) VALUES (NOW(), 'Log In', '".$user["id_user"]."')");
                session_start();
                $_SESSION["username"] = $user["username"];
                $_SESSION["tipe_user"] = $user["tipe_user"];
                header("Location:admin.php");
                exit;
            } else if($user["tipe_user"] == "apoteker") {
                mysqli_query($conn, "INSERT INTO tbl_log(waktu, aktifitas, id_user) VALUES (NOW(), 'Log In', '".$user["id_user"]."')");
                session_start();
                $_SESSION["username"] = $user["username"];
                $_SESSION["tipe_user"] = $user["tipe_user"];
                header("Location:apoteker.php");
                exit;
            } else if($user["tipe_user"] == "kasir"){
                mysqli_query($conn, "INSERT INTO tbl_log(waktu, aktifitas, id_user) VALUES (NOW(), 'Log In', '".$user["id_user"]."')");
                session_start();
                $_SESSION["username"] = $user["username"];
                $_SESSION["tipe_user"] = $user["tipe_user"];
                header("Location:kasir.php");
                exit;
            } else {
                echo "<script>alert('User tidak diketahui! hubungi admin untuk bantuan')</script>";
            };
        } else {
            echo "<script>alert('Password salah!')</script>";
        };
    } else {
        echo "<script>alert('Username salah!')</script>";
    };
};
?>