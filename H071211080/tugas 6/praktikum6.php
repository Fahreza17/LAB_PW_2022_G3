<?php 
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'praktikum';
$fail ="";
$success = "";
$success1 ="";
$fail1 = "";
$conn =  mysqli_connect($hostname,$username,$password,$dbname) or die ('Gagal Terhubung ke database');

 

            if(isset($_POST['submit'])){
            $nama= $_POST['nim'];
            $nim = $_POST['name'];
            $address= $_POST['address'];
            $faculty = $_POST['faculty'];
            $success ="";
            $fail = "";


            if($nama&&$nim&&$address&&$faculty){
                $sql = "INSERT INTO mahasiswa VALUES('','$nama','$nim','$address','$faculty')";
                if($result = mysqli_query($conn,$sql)){
                    $success = "New data have been inserted";
                }
            }else{
                $fail ="Data have been failed to inserted";
            }
        }

        if(isset($_POST['simpan'])){
            //  $no = $_GET['No'];
            $nama= $_POST['nim'];
            $nim = $_POST['name'];
            $address= $_POST['address'];
            $faculty = $_POST['faculty'];
            $success1 ="";
            $fail1 = "";


            if($nama&&$nim&&$address&&$faculty){
                $sql2 = "update mahasiswa set Nim = '$nama',Nama='$nim',alamat='$address',fakultas
                ='$faculty' where Nim ='$nama'";
                $r3 = mysqli_query($conn,$sql2);
                if($r3){
                    $success1 = "Update success";
                }
                }
                else{
                    $fail1 = "Update failed";
            }
        }
        if(isset($_GET['op'])){
            $nim = $_GET['nim'];
            $sql3 = "delete from mahasiswa where Nim = '$nim'";
            $r4 = mysqli_query($conn,$sql3);
            if($r4){
                $success = "Delete berhasil";
            }else{
                $fail = "Delete gagal";
            }
        } 
        
        
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lev Computer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            #form{
                position:relative;
                left:30%;
            }
            #form1{
                position:relative;
                left:30%;
            }
            #sidebar{
                position:relative;
                top:-24px;
                left:-10px;
            }
            #menu{
                height:520px;
                position:absolute;
            }
            .navbar{
            
            }
            .student{
                position:relative;
                top:20px;
            }
            #table{
                padding-left:400px;
            
        
            }
        </style>
</head>
<body >
<nav class="navbar bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand ps-1">Hogwarts Students</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success text-light" type="submit">Search</button>
    </form>
  </div>
</nav>
 <section >
                <div class="row text-center ps-3 pt-4  "id="sidebar">
                    <div class="col-md-1 bg-primary" id="menu">
                        <button href=""class=""onclick="page1()"> Student</button>
                        <button href=""class=" student"onclick="page2()">Database</button>
                    </div>
            <div class="col-md-6"id="form">
                <form method="post">
                    <h2>Welcome to Pendataan Mahasiswa</h2>
                   <?php
                    if($fail){

                        ?>
                        <div class="alert alert-danger" role="alert">
                        <?php  echo $fail?>
                        </div>
                        <?php


                    }
                   ?>

                <?php
                    if($success){

                        ?>
                        <div class="alert alert-success" role="alert">
                        <?php  echo $success?>
                        </div>
                        <?php


                    }
                   ?>
                <div class="mb-3 ">
                <label for="name" class="form-label ">Nim</label>
                <input type="text" name="nim" class="form-control" id="nama" aria-describedby="emailHelp"></div>
                <div class="mb-3">
                <label for="username" class="form-label ">Name</label>
                <input type="text"  name = "name" class="form-control" id="user">
                </div>
                <div class="mb-3">
            <label for="email" class="form-label ">Address</label>
                <input type="text" name = "address" class="form-control" id="email">
                </div>
                <div class="mb-3">
                <label for="password"class="form-label ">Faculty</label>
                <input type="text"  name= "faculty"  class="form-control" id="pass">
            </div>
            <div class="row submit justify-content-center pt-3">
                <div class="col-md-6">
                <button type="submit" name="submit"class="btn btn-primary">Submit</button>
                </div>
                <div class="row">
                    <div class="col-1" ></div>
                </div>
            </div>
            </form>
            </div>
    </div>
    </div>

    <!-- database -->
    <div class="row justify-content-center "id="table">
        <form >
            <input type="text" name = "input">
            <button name= "search">Search</button>
        </form>
        <div class="col-6">
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
  </thead>
  <tbody>

  <?php
 $sql = "Select * from mahasiswa order by No";
 $run = mysqli_query($conn,$sql);
 $nourut = 1;
 if(isset($run)){
    while($row =mysqli_fetch_assoc($run)){
        $No = $row['No'];
        $nim = $row['Nim'];
        $nama = $row['Nama'];
        $alamat = $row['alamat'];
        $fakultas = $row['fakultas'];
?>
<tr>
      <th scope="row"><?php echo $No ?></th>
      <td><?php echo $nim ?></td>
      <td><?php echo $nama ?></td>
      <td><?php echo $alamat ?></td>
      <td><?php echo $fakultas ?></td>
      <td>
        <a onclick ="page3()"class = "btn btn-primary ">Edit</a>
        <a href="login.php?op=delete&nim=<?php echo $nim ?>" name="edit" onclick="return confirm('Yakin mau hapus data?')"class = " mt-2 btn btn-warning mb-1">Delete</a>
      </td>
    </tr>
<?php
  
}}
if(isset($_POST['search'])){
    $submit = $_POST['input'];
    $sql1 = "Select * from mahasiswa where Nim = $submit";
     $run2 = mysqli_query($conn,$sql);
     if($run2){
        while($row =mysqli_fetch_assoc($run2)){
            $No = $row['No'];
            $nim = $row['Nim'];
            $nama = $row['Nama'];
            $alamat = $row['alamat'];
            $fakultas = $row['fakultas'];
    ?>
    <tr>
          <th scope="row"><?php echo $No ?></th>
          <td><?php echo $nim ?></td>
          <td><?php echo $nama ?></td>
          <td><?php echo $alamat ?></td>
          <td><?php echo $fakultas ?></td>
          <td>
            <a onclick ="page3()"class = "btn btn-primary ">Edit</a>
            <a href="login.php?op=delete&nim=<?php echo $nim ?>" name="edit" onclick="return confirm('Yakin mau hapus data?')"class = " mt-2 btn btn-warning mb-1">Delete</a>
          </td>
        </tr>
    <?php
      
    }
}}
    
  ?>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody> -->
</table>
</div>
</div>

<div class="row text-center ps-3 pt-4  "id="sidebar">
            <div class="col-md-6"id="form1">
                <form method="post">
                    <h2>Update Mahasiswa</h2>
                   <?php
                    if($fail1){

                        ?>
                        <div class="alert alert-danger" role="alert">
                        <?php  echo $fail1?>
                        </div>
                        <?php


                    }
                   ?>

                <?php
                    if($success1){

                        ?>
                        <div class="alert alert-success" role="alert">
                        <?php  echo $success1?>
                        </div>
                        <?php


                    }
                   ?>
                <div class="mb-3 ">
                <label for="name" class="form-label ">Nim</label>
                <input type="text" name="nim" class="form-control" id="nama" aria-describedby="emailHelp"></div>
                <div class="mb-3">
                <label for="username" class="form-label ">Name</label>
                <input type="text"  name = "name" class="form-control" id="user">
                </div>
                <div class="mb-3">
            <label for="email" class="form-label ">Address</label>
                <input type="text" name = "address" class="form-control" id="email">
                </div>
                <div class="mb-3">
                <label for="password"class="form-label ">Faculty</label>
                <input type="text"  name= "faculty"  class="form-control" id="pass">
            </div>
            <div class="row submit justify-content-center pt-3">
                <div class="col-md-6">
                <button type="submit" onclick="page4()" name="simpan"class="btn btn-primary">Submit</button>
                </div>
                <div class="row">
                    <div class="col-1" ></div>
                </div>
            </div>
            </form>
            </div>
    </div>
    </div>
    <script>


        var z = document.getElementById("form1");
        z.style.display= "none";
         var y = document.getElementById("table");
         y.style.display = "none";
        function page2(){
            var x =  document.getElementById("form");
            var y = document.getElementById("table");
            var z = document.getElementById("form1");

            x.style.display = "none";
            y.style.display = "block";
            z.style.display = "none";
        }
        

        function page1(){
            var x =  document.getElementById("form");
            var y = document.getElementById("table");
            var z = document.getElementById("form1");

            y.style.display = "none";
            x.style.display = "block";
            z.style.display = "none";
        }

        function page3(){
            var x =  document.getElementById("form");
            var y = document.getElementById("table");
            var z = document.getElementById("form1");

            y.style.display = "none";
            x.style.display = "none";
            z.style.display = "block";
        }

        function page4(){
            var x =  document.getElementById("form");
            var y = document.getElementById("table");
            var z = document.getElementById("form1");

            y.style.display = "none";
            x.style.display = "none";
            z.style.display = "block";
        }

      

        
    </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>