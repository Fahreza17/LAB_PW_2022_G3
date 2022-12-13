<?php
    require 'functions.php';

    $senjata = query('SELECT * FROM senjata');

    if(isset($_POST['submit'])) {

        if($_POST['kode'] == '' || $_POST['nama'] == '' || $_POST['jenis'] == '') {
            echo '<script>
            alert("Tolong isi semua data dengan benar!");
            </script>';
        } else {

            if(dup($_POST) == true) {
                echo '<script>'; 
                echo 'alert("Kode/nama sudah ada");'; 
                echo 'window.location.href = "index.php";';
                echo '</script>';
            } else {
                if(qInsert($_POST) > 0) {
                    echo '<script>
                    alert("Produk berhasil dimasukkan");
                    window.location.href = window.location.href;
                    </script>';
                } else {
                    echo '<script>
                    alert("Produk gagal dimasukkan");
                    </script>';
                };
            }
            
        };

    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <title>Armory</title>
</head>
<body>
    <div class="container-md">
        <div class="row pt-5">
            <div class="card">
                <div class="card-header bg-warning">Input Produk</div>
                <form action="" method ="post">
                    <div class="form-group row pt-3">
                        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kode" name="kode" placeholder="**********">
                        </div>
                    </div>
                    <div class="form-group row pt-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="form-group row pt-3 pb-4">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jenis" name="jenis">
                        </div>
                    </div>
                    <div class='pb-3 d-flex justify-content-end'>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>      
        </div>
        
        <div class="row pt-5">
            <div class="card">
                <div class="card-header bg-dark text-white">List Produk</div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1; 
                            foreach($senjata as $row) : 
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <th><?= $row["kode"] ?></th>
                            <td><?= $row["nama"] ?></td>
                            <td><?= $row["jenis"] ?></td>
                            <td>
                                <div class="button-group" role="group" aria-label="button">
                                    <a href="edit.php?kode=<?= $row["kode"] ?>" class='btn btn-warning'>Ubah</a>
                                    <a href="hapus.php?kode=<?= $row["kode"] ?>" class='btn btn-danger' onclick="return confirm('Data akan dihapus, lanjutkan?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                            $i++; 
                            endforeach; 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
</body>
</html>