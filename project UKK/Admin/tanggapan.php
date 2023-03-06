<?php
session_start();



$db = new PDO("mysql:host=localhost;dbname=pelaporan_pengaduan_masyarakat", 'root', '');
$query = $db->query("SELECT * FROM pengaduan");

//     if(! isset($_SESSION["id_pengaduan"])){
//     header("location:login.php");
//  }
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css"></link>

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Laporan</title>
</head>
<style>
    body {
        background-image: url("pixelart.jpg");
        background-size: cover;
    }
</style>

<body>
    <?php
    $db = new PDO("mysql:host=localhost;dbname=pelaporan_pengaduan_masyarakat", 'root', '');
    // $query = $db->query("SELECT pengaduan.id_pengaduan,pengaduan.tgl_pengaduan,pengaduan.nik,pengaduan.isi_laporan,pengaduan.foto,pengaduan.status,tanggapan.id_petugas,tanggapan.tanggapan FROM pengaduan INNER JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan");
    $query = $db->query('SELECT * FROM pengaduan')

    ?>

    <div class="container-sm">

        <h1 class="text-black text-center">Laporan</h1>
        <table border="1" cellpadding="10" id="datatable" cellspacing="0" class="table table-bordered border-secondary bg-white text-center">
            <thead class="bg-secondary text-white">
                <th>id_pengaduan</th>
                <th>Tanggal</th>
                <th>Nik</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                <th>Status</th>
                <th>TANGGAPAN</th>
            </thead>

            <tbody>
                <?php while ($data = $query->fetch()) : ?>
                    <tr>
                    <?php $id_pengaduan =  $data['id_pengaduan']; ?>
                        <td><?= $id_pengaduan ?></td>
                        <td><?= $data['tgl_pengaduan'] ?></td>
                        <td><?= $data['nik'] ?></td>
                        <td><?= $data['isi_laporan'] ?></td>
                        <td><img src="<?='../img_laporan/' . $data['foto'] ?>" width="100px"></td>
                        <td><?= $data['status'] ?></td>
                        <TD>

                       <a href="tanggapan_2.php?id_pengaduan=<?= $id_pengaduan ?>" class="btn btn-primary">Tanggapi</a>
                       
                        </TD>


                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
        <a href="Tampilan.php " class="btn btn-danger"><i class="bi bi-house-fill"></i></a>
        

    </div>
    


    <h2 class="text-center">TANGGAPAN</h2>
    <div class="container">
        <?php
        $query = $db->query("SELECT * FROM tanggapan INNER JOIN pengaduan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan INNER JOIN petugas ON petugas.id_petugas = tanggapan.id_petugas;");
        $datas = $query->fetchAll();
        // var_dump($data);
        // die();

        ?>
        <table border="1" id="datatable" cellpadding="10" cellspacing="0" class="table table-bordered border-secondary bg-white text-center">
            <thead class="bg-secondary text-white">
                <th>id_petugas</th>
                <th>id_pengaduan</th>
                <th>Tanggal Tanggapan</th>
                <th>Tanggapan</th>
                <th>Petugas</th>
            </thead>

            <tbody>
                <?php foreach ($datas as $data) : ?>
                    <tr>
                        <td><?= $data['id_tanggapan'] ?></td>
                        <td><?= $data['id_pengaduan'] ?></td>
                        <td><?= $data['tgl_tanggapan'] ?></td>
                        <td><?= $data['tanggapan'] ?></td>
                        <td><?= $data['nama_petugas'] ?></td>


                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </hr>
    <!-- <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.24/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#datatable').DataTable({
          dom: 'Bfrtip',
          buttons: [
            'print'
          ]
        });
      }); -->
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>