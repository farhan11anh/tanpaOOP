<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
	<title>tambah Data</title>
</head>
<body>
	<div class="container mt-5 ">
		<center class="mb-5" ><h2>Upload</h2></center>
		<hr>
		<?php if (isset($_GET['pesan'])) { ?>
			<?php if ($_GET['pesan'] == "berhasil") { ?>
				<div class="alert alert-primary" role="alert">
					Berhasil Menambahkan Data Siswa
				</div>
			<?php }elseif ($_GET['pesan'] == "gagal") { ?>
				<div class="alert alert-danger" role="alert">
					Gagal Menambahkan Data Siswa
				</div>
			<?php }elseif ($_GET['pesan'] == "ekstensi") { ?>
				<div class="alert alert-warning" role="alert">
					Ekstensi File Harus PNG Dan JPG
				</div>
			<?php }elseif ($_GET['pesan'] == "size") { ?>
				<div class="alert alert-warning" role="alert">
					Size File Tidak Boleh Lebih Dari 2 MB
				</div>
			<?php } ?>
		<?php } ?>
		<br>

		<form action="proccess/add.php" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Score</label>
				<input type="text" name="score" class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Description</label>
				<input type="text" name="description" class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">File Rekap Nilai</label>
				<input type="file" name="file" class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Materi</label>
                <select name="materi_id" id="">
                    <option value="1">Materi 1</option>
                    <option value="1">Materi 2</option>
                    <option value="1">Materi 3</option>
                </select>
			</div>
			<div class="mb-3">
				<label class="form-label">User</label>
                <select type="number" name="user_id" id="">
                    <option value=1>User 1</option>
                    <option value=1>User 2</option>
                    <option value=1>User 3</option>
                </select>
			</div>
			<div class="mb-3">
				<button class="btn btn-success" type="submit">Submit</button>
				<a href="index.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>
		
	</div>
</body>
</html>