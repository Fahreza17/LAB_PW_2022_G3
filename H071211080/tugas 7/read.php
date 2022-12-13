<?php 
require_once('../dasar/config.php');
$db = new insert();
$result1=$db->readData();

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
          #table{
            padding-bottom:400px;
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
            <div class="col-6 m-auto"id="table">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nim</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Fakultas</th>
      <th scope="col">Action</th>
    </tr>
    <?php 
    while($result=mysqli_fetch_assoc($result1)){

        ?>
         <tr>
         <td scope="row"><?php echo $result['No'] ?></th>
      <td><?php echo  $result['Nama'] ?></td>
      <td><?php echo  $result['Nim'] ?></td>
      <td><?php echo  $result['alamat']?></td>
      <td><?php echo  $result['fakultas'] ?></td>
      <td>
        <a href="update.php"class = "btn btn-primary ">Edit</a>
        <a href="read.php" name="delete" onclick="return confirm('Yakin mau hapus data?')"class = " mt-2 btn btn-warning mb-1">Delete</a>
      </td>
      </tr>
        <?php
    }
    ?>
  
  </thead>
  <tbody>
    </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>