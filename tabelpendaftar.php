<?php
require "functions.php";
$siswa = query("SELECT * FROM pendaftar");
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
    <h1>Data Calon Siswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Asal Sekolah</th>
            <th>Pilihan 1</th>
            <th>Pilihan 2</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($siswa as $b) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $b["nama"]; ?></td>
                <td><?= $b["asal"]; ?></td>
                <td><?= $b["pil1"]; ?></td>
                <td><?= $b["pil2"]; ?></td>
                <td>
                    <a href="admin.php?pilih&&id=<?= $b["idpendaftar"]; ?>">Pilih Jurusan</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>