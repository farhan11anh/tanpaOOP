<?php
include "config/config.php";
$query = mysqli_query($koneksi, "SELECT user_id, score, ROUND(AVG(score)) as nilaiMateri from tbl_score where user_id=1;");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
	<title>Skor permateri</title>
</head>
<body>
	<div class="container mt-5 ">
		<center class="mb-5" ><h2>Skor permateri</h2></center>
		<hr>
		<form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
				<label class="form-label">User</label>
				<input type="text" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">Score</label>
				<input type="text" name="score" class="form-control" value="<?php echo $row['nilaiMateri']; ?>">
			</div>
            <div class="mb-3">
				<label class="form-label">Materi</label>
				<input type="text" name="materi_id" class="form-control"
                value=" <?php
                                $nilai = $row['nilaiMateri'];
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
                        ?>">
			</div>
		</form>
		
	</div>
</body>
</html>