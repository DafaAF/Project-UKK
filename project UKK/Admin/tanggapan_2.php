<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Laporan</title>
    <title></title>

</head>
<body>
                        <form action="proses_tanggapan.php?id_pengaduan=<?= $_GET['id_pengaduan'] ?>" method="POST">
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
                                <button type="submit" class="btn btn-primary mt-5">Kirim Tanggapan</button>
                            </div>
                            </form>
</body>
</html>