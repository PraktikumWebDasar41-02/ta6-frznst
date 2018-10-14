<?php
include('dat.php');
if (isset($_POST['submit'])) {
	// $nama=$_POST['nama'];
	// $nim=$_POST['nim'];
	// $kelas=$_POST['kls'];
	// $kelamin=$_POST['kelamin'];
	// $hobi=$_POST['hobi'];
	// $fakultas=$_POST['fakultas'];
	// $alamat=$_POST['alamat'];

	if (empty($_POST['nama'])||empty($_POST['nim'])||empty($_POST['kls'])||empty($_POST['kelamin'])||empty(serialize($_POST['hobi']))||empty($_POST['fakultas'])||empty($_POST['alamat'])) {
		echo "<script>alert('semua data wajib diisi')</script>";
	}

	else{
	$cek=[];
	$nama=$_POST['nama'];
	$nim=$_POST['nim'];
	$kelas=$_POST['kls'];
	$kelamin=$_POST['kelamin'];
	$hobi=implode("-",$_POST['hobi']);
	$fakultas=$_POST['fakultas'];
	$alamat=$_POST['alamat'];

	if (is_numeric($nama)==TRUE) {
		$cek[1]="<mark>Nama Tidak Boleh Angka</mark>";
	}
	elseif (strlen(trim($nama))>35) {
		$cek[1]="<mark>Nama Tidak Boleh Lebih Dari 35 Karakter</mark>";
	}
//namaval

	if (is_numeric(trim($nim))==FALSE) {
		$cek[2]="<mark>NIM Tidak Boleh Huruf</mark>";
	}

	elseif (strlen(trim($nim))>10) {
		$cek[2]="<mark>NIM Tidak Boleh Lebih Dari 10 Karakter</mark>";
	}
//nimval

	else{
		if(cekAkun($nim)==FALSE){
		insert($nim,$nama,$kelas,$kelamin,$hobi,$fakultas,$alamat);
		echo "<script>alert('Selamat Data Anda Telah Didaftarkan')</script>";
		header('location:log.php');}
		
		elseif(cekAkun($nim)==TRUE){
			$cek[2]="<mark>NIM sudah terdaftar</mark>";
		}
	}

	}





	}






?>
<!DOCTYPE html>
<html>
<head>
	<title>reg</title>
</head>
<body>
<form method="POST" action="">
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

		<tr><td>Kelas</td></tr>
		<tr><td><input type="radio" name="kls" value="MI01">MI01<input type="radio" name="kls" value="MI02">MI02<input type="radio" name="kls" value="MI03">MI03<input type="radio" name="kls" value="MI04">MI04</td></tr>
		<tr></tr>

		<tr><td>Jenis Kelamin</td></tr>
		<tr><td><input type="radio" name="kelamin" value="pria">Pria<input type="radio" name="kelamin" value="wanita">Wanita</td></tr>
		<tr></tr>

		<tr><td>Hobi</td></tr>
		<tr><td><input type="checkbox" name="hobi[]" value="sepeda">Sepeda<input type="checkbox" name="hobi[]" value="gaming">Gaming
			<input type="checkbox" name="hobi[]" value="baca">Baca</td></tr>

		<tr><td>Fakultas</td><td><select name="fakultas">
			<option value="FIT" selected>FIT</option>
			<option value="FIK" >FIK</option>
			<option value="FKB" >FKB</option>
			<option value="FEB" >FEB</option>
			<option value="FIF" >FIF</option>
			<option value="FTE" >FTE</option>
			<option value="FRI" >FRI</option>
		</select></td></tr>

		<tr><td>Alamat</td></tr>
		<tr><td><textarea rows="5" cols="30" name="alamat"></textarea></td></tr>
		<tr><td><input type="submit" name="submit" value="submit"></td></tr>

	</table>

</form>
</body>
</html>