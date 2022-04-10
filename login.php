<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>
	<h2>Login</h2>
	<br/>
	<!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
	<br/>
	<br/>
	<form method="post" action="proccess/login.php">
		<table>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input type="text" name="email" placeholder="Masukkan Email"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="password" placeholder="Masukkan password"></td>
			</tr>
			<tr>
				<td><input type="text" name="login" hidden></td>
				<td></td>
				<td><input type="submit" name='login' value="login"></td>
			</tr>
		</table>			
	</form>
</body>
</html>