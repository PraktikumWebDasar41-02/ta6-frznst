<?php
include('dat.php');
session_start();
if(!isset($_SESSION['nim'])){
	header('location:log.php');
}
$data=getBy($_GET['id']);
// print_r($data);

if(isset($_POST['edit'])){

$cek=[];
$capt = $_POST['caption'];
$judul = $_POST['Judul'];
$date=date('Y-m-d');

if(str_word_count($capt)<30){
    $cek[1]="<mark>Caption minimal 30 kata</mark>";
    }
    else{        
        editPost($capt,$date,$_GET['id'],$judul,$_SESSION['nim']);
        header('location:halamanawal.php');
    }
}
if(isset($_POST['hapus'])){
    hapus($_GET['id'],$_SESSION['nim']);
    header('location:halamanawal.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Unggah Gambar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<form action="" enctype="multipart/form-data" method="post">
<table>
<tr><td><img src='<?php echo $data['gambar'];?>' height='240' width='240'></img></td></tr>
<tr><td><?php if(isset($cek[2]))echo $cek[2]?></td></tr>
<tr><td>Masukan Judul</td></tr>
<tr><td><input type="text" name="Judul" value="<?php echo $data['Judul'] ?>"></td></tr>
<tr><td>Masukan Caption</td></tr>
<tr><td><?php if(isset($cek[1]))echo $cek[1]?></td></tr>
<tr><td><textarea name="caption" cols="80" rows="20"><?php echo $data['caption'] ?></textarea></td></tr>
<tr><td><input type="submit" name="edit" value="edit"> <input type="submit" name="hapus" value="hapus"></td></tr>
</table>
</form>

</body>
</html>
