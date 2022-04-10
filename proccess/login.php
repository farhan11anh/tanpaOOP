<?php
session_start();

require("../config/config.php");



    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = mysqli_query($koneksi, "SELECT * FROM tbl_user where email='$email' and password='$password'");

    // hitung data user
    $cek = mysqli_num_rows($data);

    if($cek > 0){
        $_SESSION['email'] = $email;
        $_SESSION['status'] ='login';
        header("location:../index.php");
    }else {
        header("location:../login.php?pesan=gagal");
    }


?>