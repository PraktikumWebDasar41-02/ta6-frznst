<?php
$conn=mysqli_connect("localhost","root","","jurnal");
if(!$conn){
    die("Gagal Konek ".mysqli_connect_error());
}

     // $nim,$kelas,$kelamin,$hobi,$fakultas,$alamat
function insert($nim,$nama,$kelas,$kelamin,$hobi,$fakultas,$alamat)
{
    Global $conn;
    mysqli_query($conn,"INSERT INTO user VALUES('$nama','$nim','$kelas','$kelamin','$hobi','$fakultas','$alamat')");
    echo "<script>alert('Anda Telah Terdaftar')</script>";
    // $query= mysqli_query($conn,"SELECT * FROM t_jurnal1  WHERE  nim='$nim'");
    // $data= mysqli_fetch_array($query);
    // print_r($data);
    // header("location:soal2.php");
    
}
function cekAkun($nim)
{
    Global $conn;
    $query=mysqli_query($conn,"SELECT * FROM user  WHERE  nim='$nim'");
    $data=mysqli_num_rows($query);
    if ($data>0) {
        # code...
        return true;
    }
    else{
        return false;
    }
}

function cek($nim,$nama)
{
    Global $conn;
   $query= mysqli_query($conn,"SELECT * FROM user  WHERE  nim='$nim' and nama='$nama'");
   	$data=mysqli_num_rows($query);
   	if ($data>0) {
   		# code...
   		return true;
   	}
   	else{
   		return false;
   	}

    
}
function get($nim)
{
    Global $conn;
    $query= mysqli_query($conn,"SELECT * FROM user  WHERE  nim='$nim'");
    $data= mysqli_fetch_array($query);
    return $data;
    // header("location:soal2.php");   
}

function getAll(){
    Global $conn;
    $query=mysqli_query($conn,"SELECT * FROM user");
    $data=mysqli_fetch_array($query);
    return $data;
}
function update($kelas,$kelamin,$hobi,$fakultas,$alamat,$acuan)
{
    # code..
    Global $conn;
    $query=mysqli_query($conn,"UPDATE user SET 
    kelas='$kelas',
    kelamin='$kelamin',
    hobi='$hobi',
    fakultas='$fakultas',
    alamat='$alamat' WHERE nim='$acuan'");
    // $conn->query($query);
}
function upload($capt,$path,$date,$nim,$judul)
{
    # code...
    Global $conn;
    $query=mysqli_query($conn,"INSERT INTO post(judul,caption,gambar,tanggal,nim) VALUES('$judul','$capt','$path','$date','$nim') ");

}
function postingku($nim)
{
    # code...
    Global $conn;
    $data=[];
    $query=mysqli_query($conn,"SELECT * FROM post WHERE nim='$nim'");
    for($i=0;$i<mysqli_num_rows($query);$i++){
        $data[$i]=mysqli_fetch_array($query);
    }
    return $data;
}
function  getBy($id)
{
    # code...
    Global $conn;
    $data=[];
    $query=mysqli_query($conn,"SELECT * FROM post WHERE id_pict='$id'");
    $data=mysqli_fetch_array($query);
    
    return $data;
}
function editPost($capt,$date,$id,$judul,$nim)
{
    # code...
    Global $conn;
    $query=mysqli_query($conn,"UPDATE post SET 
    caption='$capt',
    tanggal='$date',
    Judul='$judul'
    WHERE nim='$nim' AND id_pict='$id'");
    // $conn->query($query);
    
}


function posting()
{
    # code...
    Global $conn;
    $data=[];
    $query=mysqli_query($conn,"SELECT * FROM post INNER JOIN user using(nim)");
    for($i=0;$i<mysqli_num_rows($query);$i++){
        $data[$i]=mysqli_fetch_array($query);
    }
    return $data;
}




?>