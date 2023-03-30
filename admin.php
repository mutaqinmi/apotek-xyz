<?php
require "functions.php";
session_start();
if(!isset($_SESSION["tipe_user"])){
    if(!isset($_SESSION["username"])){
        header("Location:login.php");
    };
    header("Location:login.php");
};

$user = mysqli_query($conn, "SELECT * FROM tbl_log ORDER BY waktu DESC");
$transaksi = mysqli_query($conn, "SELECT * FROM tbl_transaksi ORDER BY tgl_transaksi DESC");
$daftarobat = mysqli_query($conn, "SELECT * FROM tbl_obat ORDER BY id_obat DESC");
$daftaruser = mysqli_query($conn, "SELECT * FROM tbl_user ORDER BY tipe_user ASC");

if(isset($_POST["logout"])){
    session_destroy();
    header("Location:login.php");
    exit;
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin | Apotek XYZ</title>
</head>
<body>
    <div class="wrapper">
        <div class="admin">
            <h1>Hai <?php echo $_SESSION["username"] ?>!</h1>
            <p>Berikut laporan penjualan hari ini :</p>
            <div class="tabledetail">
                <table>
                    <tr>
                        <th>No Transaksi</th>
                        <th>Tanggal</th>
                        <th>Obat</th>
                        <th>ID Resep</th>
                        <th>Total Bayar</th>
                        <th>Diproses oleh</th>
                    </tr>
                    <?php while($datatransaksi = mysqli_fetch_assoc($transaksi)){?>
                        <td><?php echo $datatransaksi["no_transaksi"] ?></td>
                        <td><?php echo $datatransaksi["tgl_transaksi"] ?></td>
                        <td><?php
                        $obat = mysqli_query($conn, "SELECT * FROM tbl_obat WHERE id_obat = '".$datatransaksi["id_obat"]."'");
                        $namaobat = mysqli_fetch_assoc($obat);
                        echo $namaobat["nama_obat"];
                        ?></td>
                        <td><?php echo $datatransaksi["id_resep"] ?></td>
                        <td><?php echo $datatransaksi["total_bayar"] ?></td>
                        <td><?php
                        $name = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id_user = '".$datatransaksi["id_user"]."'");
                        $username = mysqli_fetch_assoc($name);
                        echo $username["username"];
                        ?></td>
                    <?php } ?>
                </table>
            </div>
            <div class="obat">
                <h2 style="margin-top: 2rem;">Daftar Obat</h2>
                <table>
                    <tr>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Expired Date</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                    <?php while($dataobat = mysqli_fetch_assoc($daftarobat)){?>
                        <tr>
                        <td><?php echo $dataobat["kode_obat"] ?></td>
                        <td><?php echo $dataobat["nama_obat"] ?></td>
                        <td><?php echo $dataobat["expired_date"] ?></td>
                        <td><?php echo $dataobat["jumlah"] ?></td>
                        <td><?php echo $dataobat["harga"] ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="kelola">
                    <button id="kelolaobat">Kelola Obat</button>
                </div>
            </div>
            <div class="user">
                <h2 style="margin-top: 2rem;">Daftar User</h2>
                <table>
                    <tr>
                        <th>Tipe User</th>
                        <th>Nama User</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Username</th>
                    </tr>
                    <?php while($datauser = mysqli_fetch_assoc($daftaruser)){?>
                        <tr>
                        <td><?php echo $datauser["tipe_user"] ?></td>
                        <td><?php echo $datauser["nama_user"] ?></td>
                        <td><?php echo $datauser["alamat"] ?></td>
                        <td><?php echo $datauser["telepon"] ?></td>
                        <td><?php echo $datauser["username"] ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="kelola">
                    <button id="kelolauser">Kelola User</button>
                </div>
            </div>
        </div>
        <div class="log">
            <h2>Aktifitas Log</h2>
            <div class="logact">
                <table>
                    <tr>
                        <th>Waktu</th>
                        <th>Username</th>
                        <th>Aktifitas</th>
                    </tr>
                    <?php while($datanama = mysqli_fetch_assoc($user)){ ?>
                    <tr>
                        <td><?php echo $datanama["waktu"] ?></td>
                        <td><?php
                        $name = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id_user = '".$datanama["id_user"]."'");
                        $username = mysqli_fetch_assoc($name);
                        echo $username["username"];
                        ?></td>
                        <td><?php echo $datanama["aktifitas"] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="menu">
                <form method="post">
                    <button name="logout" id="logout">Log out</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>