<?php
include('../koneksi.php');
include('session.php');
$id_pengaduan = $_GET["id_pengaduan"];
$data = $db->query("select * from `pengaduan` where id_pengaduan= '$id_pengaduan'");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"></link>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css"></link>
    <title>Data_Detail</title>
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
        <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered border-secondary bg-white text-center">
            <thead class="bg-secondary text-white">
                <th>id_pengaduan</th>
                <th>Tanggal</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                <th>Status</th>
                <th>TANGGAPAN</th>
            </thead>

            <tbody>
                <?php while ($data = $query->fetch()) : ?>
                    <tr>
                        <td><?= $data['id_pengaduan'] ?></td>
                        <td><?= $data['tgl_pengaduan'] ?></td>
                        <td><?= $data['isi_laporan'] ?></td>
                        <td><img src="<?='../img_laporan/' . $data['foto'] ?>" width="100px"></td>
                        <td><?= $data['status'] ?></td>
                        <TD>

                        <!-- <a href="#more?id_pengaduan=<?= $data['id_pengaduan'] ?> " class="btn btn-danger"><i class="bi bi-envelope"></i></a> -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tanggapi</button>
                        <!-- <a href="../masyarakat/proses_hapus.php" type="button" class="btn btn-danger">Hapus</a> -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                            <form action="proses_tanggapan.php?id_pengaduan=<?= $id ?>" method="POST">
                                <label for="inputEmail4" class="form-label">Tanggal Kejadian</label>
                                <input type="date" name="tanggal" class="form-control" id="inputEmail4">
                            </div>
                            <div class="container">
                            <div class="col-md-6">
                            <label for="floatingTextarea2">Tanggapan</label>
                            <div class="form-floating">
                            <textarea class="form-control" name="isi_tanggapan" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                            </div>
                                <select name="status" id="level ">
                                <option selected value="proses">proses</option>
                                <option value="selesai">selesai</option>
                                </select>
                            <div class="col-12">
                                <a href="proses_tanggapan.php" type="submit" class="btn btn-primary mt-5">Kirim Tanggapan</a>
                            </div>
                            </form>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                            </div>
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
        <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered border-secondary bg-white text-center">
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





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>