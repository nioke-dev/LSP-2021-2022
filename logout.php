<?php
session_start();

// menghapus semua sesioon
session_destroy();

// mengalihkan halaman dan mengirim pesan logout
header("location: login.php?pesan=logout");
