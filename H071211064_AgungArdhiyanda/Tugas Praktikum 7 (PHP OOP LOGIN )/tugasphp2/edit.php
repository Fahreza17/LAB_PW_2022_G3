<?php
/*
require_once("dbcon.php");
if (isset($_POST['save_record'])) {
    $pdo_statement = $conn->prepare("UPDATE student SET student_name = :student_name, address = :address, faculty = :faculty WHERE id = :id");
    $result = $pdo_statement->execute(array(
        ":student_name" => $_POST['student_name'],
        ":address" => $_POST['address'],
        ":faculty" => $_POST['faculty'],
        ":id" => $_GET['id']
    ));
    if (!empty($result)) {
        header('location: index.php');
    }
    
}

$stmt = $conn->prepare("SELECT * FROM student WHERE id = " . $_GET['id']);
$stmt->execute();
$result = $stmt->fetchAll();
*/
require('function.php');
$id = $_GET['id'];
$select = new select();
$row = $select->select($id);
if (isset($_POST['save_record'])) {
    $update = new update();
    $student_name = $_POST['student_name'];
    $address = $_POST['address'];
    $faculty = $_POST['faculty'];
    $result = $update->updateData($id, $student_name, $address, $faculty);
    if ($result == 1) {
        header('location: showdata.php');
    }
}


?>


<html>
<html>

<head>
    <title>Welcome To My Database</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <form style="margin-top:15px;" action="" method="POST">

            <div class="form-group">
                <label for="exampleInputEmail1">Masukkan Nama</label>
                <input type="text" id="student_name" class="form-control" name="student_name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>

                <input type="text" id="address" class="form-control" name="address">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Fakultas</label>
                <input type="text" id="faculty" class="form-control">
                <button style=" margin-top:15px;" type="submit" name="save_record" value="Save" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>

</html>