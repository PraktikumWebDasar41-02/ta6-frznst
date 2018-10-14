<?php
include('dat.php');
session_start();
if(!isset($_SESSION['nim'])){
	header('location:log.php');
}
if(isset($_POST['upload'])){

$cek=[];
$capt = $_POST['caption'];
$judul = $_POST['Judul'];
$path="img/".basename($_FILES['img']['name']);
$date=date('Y-m-d');

    if(strlen(trim($capt))<30){
    $cek[1]="<mark>Caption minimal 30 karakter</mark>";
    }
    if($path =="img/"){
        $cek[2]="<mark>Masukan gambar</mark>";
        }
    else{        
        upload($capt,$path,$date,$_SESSION['nim'],$judul);
        header('location:halamanawal.php');
    }
    

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
<tr><td>Masukan Gambar</td></tr>
<tr><td><input type="file" name="img"></td></tr>
<tr><td><?php if(isset($cek[2]))echo $cek[2]?></td></tr>
<tr><td>Masukan Judul</td></tr>
<tr><td><input type="text" name="Judul"></td></tr>
<tr><td>Masukan Caption</td></tr>
<tr><td><?php if(isset($cek[1]))echo $cek[1]?></td></tr>
<tr><td><textarea name="caption" cols="80" rows="20"></textarea></td></tr>
<tr><td><input type="submit" name="upload" value="upload"></td></tr>
</table>
</form>

</body>
</html>