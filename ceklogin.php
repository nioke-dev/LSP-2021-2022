<?php
session_start();
require 'functions.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data pada table admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

// mengihtung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['status'] = 'login';
    header("location: admin.php");
} else {
    header("location: login.php?pesan=gagal");
}
