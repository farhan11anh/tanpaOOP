<?php

//aktifkan session
session_start();

//hapus semua session
session_destroy();

//alihkan ke halaman sambil kirim logout
header("location:../index.php?pesan=logout");

?>