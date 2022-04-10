<?php

include '../config/config.php';

if(isset($_POST['score_id'])){
    if($_POST['score_id'] != ""){
        // mengambil data dari form lalu ditampung dalam variabel

        $score_id = $_POST['score_id'];
        $score = $_POST['score'];
        $description = $_POST['description'];
        $file = $_FILES['file']['name']; 
        $materi_id = (int)$_POST['materi_id']; 
        $user_id = (int)$_POST['user_id']; 
        // var_dump($description);
        // var_dump($file); die();



    } else {
        header("location:index.php");
    }

    if($file != ""){
         //ekstensi yg diijinkan
        $ekstensi_izin = array('pdf', 'docx', 'pptx', 'xlsx');

        $pisahkan_ekstensi = explode('.', $file);

        $ekstensi = strtolower(end($pisahkan_ekstensi));

        $file_tmp = $_FILES['file']['tmp_name']; 
        // Membuat angka/huruf acak berdasarkan waktu diupload
        $tanggal = md5(date('Y-m-d h:i:s'));
        // Menyatukan angka/huruf acak dengan nama file aslinya
        $file_new = $tanggal.'-'.$file; 
    } if(in_array($ekstensi, $ekstensi_izin) === true){
        // ambil data dalam table
        $get_file = "SELECT file FROM tbl_score WHERE score_id = '$score_id'";
        $data_file = mysqli_query($koneksi, $get_file);

        // ubah data jadi array
        $old_file = mysqli_fetch_array($data_file);

        // hapus file dalam filder file
        unlink("../file".$old_file['file']);

        // pindah file ke folder file
        move_uploaded_file($file_tmp, 'file/.$file_new');

        // masukan ke database 
        $query = mysqli_query($koneksi, "UPDATE tbl_score SET score='$score', description = '$description', file = '$file', materi_id = '$materi_id', user_id = '$user_id' WHERE score_id='$score_id'");

        // cek apakah data berhasil diinput
        if($query){
            header("location:../index.php?pesan=berhasil");
        } else {
            header("location:../index.php?pesan=gagal");
        }

    }else {
        //jika ekstensi tidak sesuai
        header("location:../index.php?pesan=ekstensi");
    }
}

?>