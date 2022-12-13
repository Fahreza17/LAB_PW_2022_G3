<?php
    require 'functions.php';

    session_start();
    
    $produk = new Query();
    // $edit = new Query();
    $senjata = $produk->qSelect('SELECT * FROM senjata');
    $kode = $_GET['kode'];
    $data  = $produk->qSelect("SELECT * FROM senjata WHERE kode = '$kode'")[0];

    if(isset($_POST['submit'])) {

        if($_POST['nama'] == '' || $_POST['jenis'] == '') {
            echo '<script>
            alert("Please fill the form correctly!");
            </script>';
        } else {
            if($produk->qUpdate($kode) > 0) {
                echo '<script>
                alert("Product edited!");
                window.location.href = window.location.href;
                </script>';
            } else {
                echo '<script>
                alert("Product failed to be edited :(");
                </script>';
            };
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
                <div class="card-header bg-warning">Input Product</div>
                <form action="" method ="post">
                    <div class="form-group row pt-3">
                        <label for="kode" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="kode" name="kode" placeholder="**********" value="<?= $data['kode'] ?>">
                        </div>
                    </div>
                    <div class="form-group row pt-3">
                        <label for="nama" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>">
                        </div>
                    </div>
                    <div class="form-group row pt-3 pb-4">
                        <label for="jenis" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $data['jenis'] ?>">
                        </div>
                    </div>
                    <div class='pb-3 d-flex justify-content-end'>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>      
        </div>
        
        <div class="row pt-5">
            <div class="card">
                <div class="card-header bg-dark text-white">Products List</div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Action</th>
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
                                    <a href="edit.php?kode=<?= $row["kode"] ?>" class='btn btn-warning'>Edit</a>
                                    <a href="delete.php?kode=<?= $row["kode"] ?>" class='btn btn-danger' onclick="return confirm('Data akan dihapus, lanjutkan?')">Delete</a>
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

        <div class="d-flex justify-content-end pt-4 pb-3">
            <a href="sign-out.php" class='btn btn-danger'>Sign Out</a>
        </div>
    </div>
    
    <script src="reload.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
</body>
</html>