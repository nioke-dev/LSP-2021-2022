<?php
require "functions.php";
$id = $_GET["id"];
$siswa = query("SELECT * FROM pendaftar WHERE idpendaftar = $id")[0];
$jurusan = query("SELECT * FROM jurusan");
if (isset($_POST["submit"])) {
    if (piljur($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Disimpan');
                document.location.href='?hasil';                
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal Disimpan');
                document.location.href='piljurusan.php';                
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
    <title>Pilih Jurusan</title>
</head>

<body>
    <h1>Pilih Jurusan Calon Peserta</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Id Pendaftar</td>
                <td><input type="text" name="id" value="<?= $siswa["idpendaftar"]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama Pendaftar</td>
                <td><input type="text" name="nama" value="<?= $siswa["nama"]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Pilihan 1</td>
                <td><input type="text" size="35" name="pil1" value="<?= $siswa["pil1"]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Pilihan 2</td>
                <td><input type="text" size="35" name="pil2" value="<?= $siswa["pil2"]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Jurusan Terpilih</td>
                <td>
                    <select name="jurusanok" id="">
                        <?php foreach ($jurusan as $j) : ?>
                            <option value="<?= $j["idjurusan"]; ?>"><?= $j["namajurusan"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <button type="submit" name="submit">Pilih</button>
            </tr>
        </table>
    </form>
</body>

</html>