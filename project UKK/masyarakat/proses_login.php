<?php
    $db = new pdo("mysql:host=localhost;dbname=pelaporan_pengaduan_masyarakat;",'root','');

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = $db->query("select * from masyarakat where username='$username' AND password='$password'"); // jalankan query
    $dataArray = $query->fetchAll(); // ubah ke bentuk array

    if($dataArray){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("tampilan.php");
    }
    else{
        header("Location:login_1.html");
    }
    ?>