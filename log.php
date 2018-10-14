<?php
include('dat.php');
session_start();
if (isset($_POST['submit'])) {
	# code...
	if (empty($_POST['nama'])||empty($_POST['nim'])){
		# code...
		echo "<script>alert('semua data wajib diisi')</script>";
	}
	else{
    $cek=[];
	$nama=$_POST['nama'];
	$nim=$_POST['nim'];

	if (is_numeric($nama)==TRUE) {
		$cek[1]="<mark>Nama Tidak Boleh Angka</mark>";
	}

	if (is_numeric($nim)==FALSE) {
		$cek[2]="<mark>NIM Tidak Boleh Huruf</mark>";
	}


	else  {
			if (cek($nim,$nama)==true) {
				# code...
				$_SESSION['nim'] =$nim;
				echo "<script>alert('Selamat Datang $nama')</script>";
				header('location:halamanawal.php');


			}
			else{
				echo "<script>alert('Anda Belum Terdaftar')</script>";
				
			}

			

		}
	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
<form action="" method="POST">
	<table>
		<tr><td>Masukan Nama</td><td><input type="text" name="nama"></td></tr>
		<?php
		if (isset($cek[1])) {
			# code...
		
	echo "<tr><td>".$cek[1]."</td></tr>";
}
		?>

		<tr><td>Masukan Nim</td><td><input type="text" name="nim"></td></tr>
		<?php
		if (isset($cek[2])) {
			# code...
		
	echo "<tr><td>".$cek[2]."</td></tr>";
}

		?>
		<tr><td><input type="submit" name="submit" value="submit"></td></tr>
	</table>
	<br>
	<a href="reg.php">Belum terdaftar ?</a>
</form>

</body>
</html>