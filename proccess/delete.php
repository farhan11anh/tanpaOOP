<?php

include '../config/config.php';

if(isset($_GET['score_id'])) {
    if($_GET['score_id'] != ""){

        // ambil id di url
        $score_id = $_GET['score_id'];

        // ambil data file dalam table
        $get_file = "SELECT file FROM tbl_score WHERE score_id='$score_id'";
        $data_file = mysqli_query($koneksi, $get_file);

        //ubah data ke array
        $old_file = mysqli_fetch_array($data_file);

        // hapus file dalam folder file
        unlink("file/".$old_file['file']);

        // hapus berdasarkan ID
        $query = mysqli_query($koneksi, "DELETE FROM tbl_score where score_id='$score_id'");
        
        if($query){
            header("location:../index.php?pesan=hapus");
        }else{
            header("location:../index.php?pesan=gagalhapus");
        }
    }else {
        header("location:../index.php");
    }
}


?>