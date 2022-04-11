<?php

session_start();
if($_SESSION['status'] != "login"){
	header('location:login.php?pesan=belum_login');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
	<title>Daftar Nilai</title>
</head>
<body>
	<div class="container mt-5 ">
	<a href="proccess/logout.php">LOGOUT</a>
	<h4>Selamat datang, <?php echo $_SESSION['email']; ?>! anda telah login.</h4>
		<center class="mb-5" ><h2>Daftar Nilai</h2></center>
		<hr>
		<?php if (isset($_GET['pesan'])) { ?>
			<?php if ($_GET['pesan'] == "berhasil") { ?>
				<div class="alert alert-primary" role="alert">
					Berhasil Mengubah Data 
				</div>
			<?php }elseif ($_GET['pesan'] == "gagal") { ?>
				<div class="alert alert-danger" role="alert">
					Gagal Mengubah Data 
				</div>
			<?php }elseif ($_GET['pesan'] == "ekstensi") { ?>
				<div class="alert alert-warning" role="alert">
					File Tidak sesuai
				</div>
			<?php }elseif ($_GET['pesan'] == "size") { ?>
				<div class="alert alert-warning" role="alert">
					Size File Tidak Boleh Lebih Dari 2 MB
				</div>
			<?php }elseif ($_GET['pesan'] == "hapus") { ?>
				<div class="alert alert-primary" role="alert">
					Berhasil Menghapus Data 
				</div>
			<?php }elseif ($_GET['pesan'] == "gagalhapus") { ?>
				<div class="alert alert-danger" role="alert">
					Gagal Menghapus Data 
				</div>
			<?php } ?>
		<?php } ?>
		<br>
		<a href="insert.php" class="btn btn-primary mb-2">Tambah Data</a>
		<a href="materiScore.php" class="btn btn-primary mb-2">Nilai Materi</a>
		<table class="table table-bordered mt-4" id="myTable">
			<thead>
				<tr>
					<th scope="col" width="1%">No</th>
					<th scope="col">Nilai</th>
					<th scope="col">Grade</th>
					<th scope="col">Deskripsi</th>
					<th scope="col">Lampiran</th>
					<th scope="col">Materi_id</th>
					<th scope="col">User_id</th>
					<th scope="col">Dibuat</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include 'config/config.php';

				$no = 1;
				$get_data = mysqli_query($koneksi,"SELECT * FROM tbl_score");
				while ($data = mysqli_fetch_array($get_data)) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['score']; ?></td>
                        <td>
                            <?php
                                $nilai = $data['score'];
                                if($nilai > 80){
                                    echo 'A';
                                }elseif($nilai > 60){
                                    echo 'B';
                                }elseif($nilai > 40){
                                    echo 'C';
                                }elseif($nilai > 20){
                                    echo 'D';
                                }else{
                                    echo 'E';
                                }
                            ?>
                        </td>
						<td><?php echo $data['description']; ?></td>
						<td><?php echo $data['file']; ?></td>
						<td><?php echo $data['materi_id']; ?></td>
						<td><?php echo $data['user_id']; ?></td>
						<td><?php echo $data['create_at']; ?></td>
                        <!-- <td>Edit || Hapus</td> -->
						<td>
							<a href="edit.php?score_id=<?php echo $data['score_id'] ?>" class="btn btn-warning text-white">Edit</a>
							<a href="proccess/delete.php?score_id=<?php echo $data['score_id'] ?>" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>