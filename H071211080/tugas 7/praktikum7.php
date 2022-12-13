<?php 
require_once('../dasar/config.php');
$db = new insert();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>praktikum7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
          #sidebar{
                position:relative;
                top:-24px;
                left:-10px;
            }
          #menu{
            height:520px;
          }
        </style>
</head>
<body>
<nav class="navbar bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand ps-1">Hogwarts Students</a>
  </div>
</nav>
<div class="row text-center ps-3 pt-4 justify-content-center  "id="sidebar">
                    <div class="col-md-1 bg-primary" id="menu">
                        <a class="btn btn-warning"href="praktikum7.php"class=""> Student</a>
                        <a href="read.php"class="mt-3 btn btn-warning">Database</a>
        </div>
            <div class="col-6 m-auto">
                <div>
                    <div>
                        <h2> Signup Form </h2>
                    </div>
                        <?php $db->getData(); ?>
                        <div class="card-body">
                            <form method="POST">
                                <input type="text" name="nama" placeholder=" nama" class="form-control mb-2" required>
                                <input type="text" name="nim" placeholder=" nim" class="form-control mb-2" required>
                                <input type="text" name="alamat"  placeholder=" alamat" class="form-control mb-2" required>
                                <input type="text" name="fakultas" placeholder=" fakultas" class="form-control mb-2" required>
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="submit"> Save </button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>