<?php
session_start();
include("../koneksi.php");
$id_pengaduan            = rand(1,10000);
$tgl_pengaduan =$_POST['tgl_pengaduan'];
$nik           = $_SESSION ["nik"];
$isi_laporan   =$_POST['isi_laporan'];
$foto          =$_FILES['foto']['name'];
$status        ='0';

$query = $db->query("insert into pengaduan VALUES('$id_pengaduan','$tgl_pengaduan','$nik','$isi_laporan','$foto','$status')");

header("Location:data.php");
?>