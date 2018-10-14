<?php
include('dat.php');
session_start();
if(!isset($_SESSION['nim'])){
	header('location:log.php');
}
$value=get($_SESSION['nim']);

if (isset($_POST['submits'])) {
    if (empty($_POST['kls'])||empty($_POST['kelamin'])||empty(serialize($_POST['hobi']))||empty($_POST['fakultas'])||empty($_POST['alamat'])) {
		echo "<script>alert('semua data wajib diisi')</script>";
    }
    else{
        $kelas=$_POST['kls'];
        $kelamin=$_POST['kelamin'];
        $hobi=implode("-",$_POST['hobi']);
        $fakultas=$_POST['fakultas'];
        $alamat=$_POST['alamat'];   
        update($kelas,$kelamin,$hobi,$fakultas,$alamat,$_SESSION['nim']);
        header('location:halamanawal.php');
    
  


    }
// echo $nim;
// echo $nama;
// echo $kelas;
// echo $kelamin;
// echo $hobi;
// echo $fakultas;
// echo $alamat;
       
                
                // // $_SESSION['nim']=$nim;
                // // echo $_SESSION['nim'];
				// // echo "<script>alert('Selamat Data Anda Telah Dirubah')</script>";
				// // // header('location:dash.php');	
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profil</title>
</head>
<body>

<form action="" method="POST">
	<table>
        <?php
        $c=[];
        $c1=[];
        $c2=[];
        $c3=[];

        if($value['fakultas']=="FIT"){
            $c3[1]="selected";
        }
        elseif($value['fakultas']=="FIK"){
            $c3[2]="selected";
        }
        elseif($value['fakultas']=="FKB"){
            $c3[3]="selected";
        }
        elseif($value['fakultas']=="FEB"){
            $c3[4]="selected";
        }
        elseif($value['fakultas']=="FIF"){
            $c3[5]="selected";
        }
        elseif($value['fakultas']=="FTE"){
            $c3[6]="selected";
        }
        elseif($value['fakultas']=="FRI"){
            $c3[7]="selected";
        }

        $hobi=explode("-",$value['hobi']);
        // print_r($hobi);
        if(in_array("sepeda", $hobi)){
            $c2[1]="checked";
        }
        if(in_array("gaming", $hobi)){
            $c2[2]="checked";
        }
        if(in_array("baca", $hobi)){
            $c2[3]="checked";
        }
    
        if($value['kelamin']=="pria"){
            $c1[1]="checked";
        }
        elseif($value['kelamin']=="wanita"){
            $c1[2]="checked";
        }
        if($value['kelas']=="MI01"){
            $c[1]="checked";
        }
        elseif($value['kelas']=="MI02"){
            $c[2]="checked";
        }
        elseif($value['kelas']=="MI03"){
            $c[3]="checked";
        }
        elseif($value['kelas']=="MI04"){
            $c[4]="checked";
        }



?>
       <tr><td>Kelas</td></tr>
        <tr><td>
            <input type="radio" name="kls" value="MI01" <?php if(isset($c[1]))echo $c[1]?>>MI01
            <input type="radio" name="kls" value="MI02" <?php if(isset($c[2]))echo $c[2]?>>MI02
            <input type="radio" name="kls" value="MI03" <?php if(isset($c[3]))echo $c[3]?>>MI03
            <input type="radio" name="kls" value="MI04" <?php if(isset($c[4]))echo $c[4]?>>MI04
        </td></tr>
		<tr></tr>

		<tr><td>Jenis Kelamin</td></tr>
        <tr><td><input type="radio" name="kelamin" value="pria" <?php if(isset($c1[1]))echo $c1[1]?> >Pria
        <input type="radio" name="kelamin" value="wanita" <?php if(isset($c1[2]))echo $c1[2]?>>Wanita
        </td></tr>
		<tr></tr>

		<tr><td>Hobi</td></tr>
        <tr><td><input type="checkbox" name="hobi[]" value="sepeda" <?php if(isset($c2[1]))echo $c2[1]?>>Sepeda
        <input type="checkbox" name="hobi[]" value="gaming" <?php if(isset($c2[2]))echo $c2[2]?>>Gaming
		<input type="checkbox" name="hobi[]" value="baca" <?php if(isset($c2[3]))echo $c2[3]?>>Baca</td></tr>

		<tr><td>Fakultas</td><td><select name="fakultas">
			<option value="FIT" <?php if(isset($c3[1]))echo $c3[1]?>>FIT</option>
			<option value="FIK" <?php if(isset($c3[2]))echo $c3[2]?> >FIK</option>
			<option value="FKB" <?php if(isset($c3[3]))echo $c3[3]?> >FKB</option>
			<option value="FEB" <?php if(isset($c3[4]))echo $c3[4]?> >FEB</option>
			<option value="FIF" <?php if(isset($c3[5]))echo $c3[5]?> >FIF</option>
			<option value="FTE" <?php if(isset($c3[6]))echo $c3[6]?> >FTE</option>
			<option value="FRI" <?php if(isset($c3[7]))echo $c3[7]?> >FRI</option>
		</select></td></tr>

		<tr><td>Alamat</td></tr>
		<tr><td><textarea rows="5" cols="30" name="alamat"><?php echo $value['alamat']?></textarea></td></tr>
		<tr><td><input type="submit" name="submits" value="submits"></td></tr>
	</table>

</form>
</body>
</html>