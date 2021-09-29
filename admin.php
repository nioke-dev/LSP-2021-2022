<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Calon Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="header">
        <h1>Halaman Admin</h1>
    </div>
    <div id="navigasi">
        <ul>
            <li><a href="?daftar">Tambah Data</a></li>
            <li><a href="?data">Data Pendaftar</a></li>
            <li><a href="?hasil">Hasil Pendaftaran</a></li>
            <li><a href="?logout">logout</a></li>
        </ul>
    </div>
    <div id="content">
        <?php
        session_start();
        if ($_SESSION['status'] != "login") {
            header("location: login.php?pesan=belum_login");
        }
        ?>
        <?php
        if (isset($_GET["daftar"])) {
            include "tambah.php";
        } else if (isset($_GET["data"])) {
            include "tabelpendaftar.php";
        } else if (isset($_GET["hasil"])) {
            include "hasil.php";
        } else if (isset($_GET["pilih"])) {
            include "pilihjurusan.php";
        } else if (isset($_GET["logout"])) {
            include "logout.php";
        } else {
            include "selamat.php";
        }
        ?>
    </div>
</body>

</html>