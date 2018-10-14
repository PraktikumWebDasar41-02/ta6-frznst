<?php
include('dat.php');
session_start();
if(!isset($_SESSION['nim'])){
	header('location:log.php');
}
$post= posting();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Postingku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <table align="center" width="500px">
    <?php
    // print_r($post);
    // echo count($post);

        foreach ($post as $v) {
            # code...
            echo "<tr><td rowspan='3'><b>$v[Judul]<b><br>
         <img src='$v[gambar]'height='240' width='240'></img></td></tr><tr><td>Diposting oleh : $v[nama]<br>Tanggal : <br>$v[tanggal]</td></tr>";
            echo "<tr><td>Caption :<br>$v[caption]</td></tr>";
            

        }
  
    ?>
    </table>
</body>
</html>