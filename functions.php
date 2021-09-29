<?php
// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "db_psb");

function query($query)
{
    // global $koneksi;
    // $result = mysqli_query($koneksi, $query);
    // $rows = [];
    // while ($row = mysqli_fetch_assoc($result)) {
    //     $rows[] = $row;
    // }
    // return $rows;

    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data)
{
    global $koneksi;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $ttl = htmlspecialchars($data['ttl']);
    $jk = htmlspecialchars($data['jk']);
    $alamat = htmlspecialchars($data['alamat']);
    $asal = htmlspecialchars($data['asal']);
    // $username = htmlspecialchars($data['username']);
    // $password = htmlspecialchars($data['password']);
    $pil1 = htmlspecialchars($data['pil1']);
    $pil2 = htmlspecialchars($data['pil2']);

    $query = "INSERT INTO pendaftar VALUES('', '$nama', '$ttl', '$jk', '$alamat', '$asal', '$pil1', '$pil2')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function piljur($data)
{
    global $koneksi;
    $id = htmlspecialchars($data['id']);
    $jurusan = htmlspecialchars($data['jurusanok']);

    $query = "INSERT INTO transaksi VALUES('', '$id', '$jurusan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
