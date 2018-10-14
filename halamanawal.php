<?php
include('dat.php');
session_start();
if(!isset($_SESSION['nim'])){
	header('location:log.php');
}
$nim=$_SESSION['nim'];
$data=get($nim);
$hobi=explode("-", $data['hobi']);
// print_r($data);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Awal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
	<script src="main.js"></script>
</head>
<body>
	<table border='2' align="center">
	<tr><td><a href="daftarposting.php">Postingan Saya</a></td>
	<td><a href="posting.php">Posting Gambar</a></td>
	<td><a href="semuaposting.php">Semua Posting</a></td>
	<td><a href="editprofile.php">Edit Profil</a></td>
	<td><a href="logout.php">Logout</a></td>
	
	</tr>
	</table>
	<br>


	<?php
echo "<table border='2' align='center'><tr><td>Nama :</td><td>".$data['nama']."</td></tr>";
echo "<tr><td>NIM :</td><td>".$data['nim']."</td></tr>";
echo "<tr><td>Kelas :</td><td>".$data['kelas']."</td></tr>";
echo "<tr><td>Jenis Kelamin :</td><td>".$data['kelamin']."</td></tr>";
echo "<tr><td>Hobi :</td><td>";
foreach ($hobi as $v) {
	echo "- ".$v."<br>";
}
echo "</td></tr>";
echo "<tr><td>Fakultas:</td><td>".$data['fakultas']."</td></tr>";
echo "<tr><td>Alamat :</td><td>".$data['alamat']."</td></tr></table>";
	?>
</body>
</html>
