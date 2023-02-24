<?php 
include('../koneksi.php');
$id_pengaduan  = $_GET["id_pengaduan"];
$isi_laporan   =$_POST['isi_laporan'];
$foto_name     =$_FILES['foto']['name'];
$foto_temp          =$_FILES['foto']['tmp_name'];

if($foto_name !== ""){
$query = "UPDATE `pengaduan` SET isi_laporan='$isi_laporan', foto='$foto_name', where id_pengaduan='$id_pengaduan' ";
move_uploaded_file($foto_temp, 'foto_name/'. $foto_name);
}

$query = $db->query($query);
if($query){
header("Location:data.php");
}
?>