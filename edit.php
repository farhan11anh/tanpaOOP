<?php

include 'config/config.php';

if(isset($_GET['score_id'])){
    if($_GET['score_id'] != ""){
        $score_id = $_GET['score_id'];

        $query = mysqli_query($koneksi, "SELECT * FROM tbl_score WHERE score_id = '$score_id'");

        $row = mysqli_fetch_array($query);
    } else {
        header("location:index.php");
    }
}else {
    header("location:index.php");
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
	
	<title>Ubah Data</title>
</head>
<body>
	<div class="container mt-5 ">
		<center class="mb-5" ><h2>Ubah Data</h2></center>
		<hr>
		<form action="proccess/edit.php" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Score</label>
				<input type="text" name="score" class="form-control" value="<?php echo $row['score']; ?>" >
				<input type="hidden" name="score_id" class="form-control" value="<?php echo $row['score_id']; ?>" >
			</div>
			<div class="mb-3">
				<label class="form-label">Description</label>
				<input type="text" name="description" class="form-control" value="<?php echo $row['description']; ?>">
			</div>
            <div class="mb-3">
				<label class="form-label">Lampiran</label>
				<input type="file" name="file" class="form-control" value="<?php echo $row['file']; ?>">
			</div>
            <div class="mb-3">
				<label class="form-label">Materi</label>
				<input type="text" name="materi_id" class="form-control" value="<?php echo $row['materi_id']; ?>">
			</div>
            <div class="mb-3">
				<label class="form-label">User</label>
				<input type="text" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>">
			</div>
			<div class="mb-3">
				<button class="btn btn-success" type="submit">Submit</button>
				<a href="index.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>
		
	</div>
</body>
</html>