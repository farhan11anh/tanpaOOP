<?php

include '../config/config.php';


// ambil data hasil dari post
$score = $_POST['score']; 
$description = $_POST['description']; 
$file = $_FILES['file']['name']; 
$materi_id = (int)$_POST['materi_id']; 
$user_id = (int)$_POST['user_id']; 



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

    if(in_array($ekstensi, $ekstensi_izin) === true){
        move_uploaded_file($file_tmp, '../file/'.$file_new);
        // echo 'sukses';
        // die();

        // $query = mysqli_query($koneksi, "INSERT INTO tbl_score(score, description, file, materi_id, user_id) VALUES ('$score', '$description', '$file', '$materi_id', '$user_id')");
        $query = mysqli_query($koneksi, "INSERT INTO `tbl_score` (`score_id`, `score`, `description`, `file`, `materi_id`, `user_id`, `create_at`) VALUES (NULL, '$score', '$description', '$file', '$materi_id', '$user_id', NOW());");
        // var_dump($query);
        // die();
        // Mengecek apakah data gagal diinput atau tidak
        if($query){
            header("location:../insert.php?pesan=berhasil");
        } else {
            header("location:../insert.php?pesan=gagal");
        }
    } else {
        // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
        header("location:insert.php?pesan=ekstensi");
    }


} else {
    $query = mysqli_query($koneksi, "INSERT INTO tbl_score(score, description, materi_id, user_id) VALUES ('$score', '$description', '$materi_id', '$user_id')");

    // Mengecek apakah data gagal diinput atau tidak
    if($query){
        header("location:insert.php?pesan=berhasil tanpa file");
    } else {
        header("location:insert.php?pesan=gagal");
    }
}


?>