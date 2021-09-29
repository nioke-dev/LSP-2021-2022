<?php
require "functions.php";
$hasil = query("SELECT * FROM jurusan, transaksi, pendaftar WHERE pendaftar.idpendaftar=transaksi.idpendaftar and jurusan.idjurusan=transaksi.idjurusan");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Id Pendaftar</th>
            <th>Nama</th>
            <th>Jurusan Terpilih</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($hasil as $h) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $h["idpendaftar"]; ?></td>
                <td><?= $h["nama"]; ?></td>
                <td><?= $h["namajurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>