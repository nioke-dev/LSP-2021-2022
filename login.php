<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login!</title>
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap Online Link
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->

    <style>
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div id="header">Header</div>
    <div id="content">
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "Login Gagal! Username dan password salah!";
            } else if ($_GET['pesan'] == "logout") {
                echo "Anda Telah Berhasil Logout";
            } else if ($_GET['pesan'] == "belum_login") {
                echo "Anda Harus Login untuk mengakses halaman admin";
            }
        }
        ?>

        <fieldset>
            <legend>
                <h1>Login System</h1>
            </legend>
            <form action="ceklogin.php" method="post">
                <table>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="login" value="Login!"></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>
    <div id="footer">
        Copyright Nioke Dev September 2021
    </div>
</body>

</html>