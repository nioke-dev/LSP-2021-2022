<?php
require "functions.php";
$jurusan = query("SELECT * FROM jurusan");
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Disimpan, Silahkan Login');
                document.location.href='admin.php?data';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Disimpan!');
                document.location.href='admin.php?daftar';
            </script>
            ";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>Tambah Data Calon Peserta</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Nama Pendaftar</td>
                <td>
                    <input type="hidden" name="id">
                    <input type="text" autocomplete="off" name="nama">
                </td>
            </tr>
            <tr>
                <td>TTL</td>
                <td><input type="text" autocomplete="off" name="ttl"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="text" autocomplete="off" name="jk"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" autocomplete="off" name="alamat"></td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td><input type="text" autocomplete="off" name="asal"></td>
            </tr>
            <tr>
                <td>Pilihan 1</td>
                <td>
                    <select name="pil1" id="">
                        <?php foreach ($jurusan as $j) : ?>
                            <option value="<?= $j["namajurusan"]; ?>"><?= $j["namajurusan"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Pilihan 2</td>
                <td>
                    <select name="pil2" id="">
                        <?php foreach ($jurusan as $j) : ?>
                            <option value="<?= $j["namajurusan"]; ?>"><?= $j["namajurusan"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Tambah Pendaftar</button></td>
            </tr>
        </table>
    </form>
</body>

</html>