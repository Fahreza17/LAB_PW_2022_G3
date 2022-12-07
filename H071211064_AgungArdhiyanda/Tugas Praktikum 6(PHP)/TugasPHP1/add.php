<?php
$errorMessage = "";
if (!empty($_POST["add_record"])) {
    require_once("dbcon.php");
    $stmt = $conn->prepare("INSERT INTO student (student_name, address, faculty) VALUES ( :student_name, :address, :faculty)");
    $result = $stmt->execute(array(
        ':student_name' => $_POST['student_name'],
        ':address' => $_POST['address'],
        ':faculty' => $_POST['faculty']
    ));
    if (!empty($result)) {
        header('location: index.php');
    } else {
        $errorMessage = "All The Fields Are Required";
    }
}

?>
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Pacifico&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Pacifico&family=Roboto+Mono:wght@200&display=swap');
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- import javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <h1>Prototype</h1>
    <div class="container">

        <form style="margin-top:15px;" action="" method="POST">

            <div class="form-group">
                <label for="exampleInputEmail1">Masukkan Nama</label>
                <input type="text" id="student_name" class="form-control" name="student_name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>

                <input type="text" id="address" class="form-control" name="address" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Fakultas</label>
                <input type="text" id="faculty" class="form-control" name="faculty" required>
                <button style=" margin-top:15px;" type="submit" name="add_record" value="Add" class="btn btn-primary">Submit</button>

            </div>
        </form>
        <form action="index.php">
            <button style=" margin-top:15px;" type="submit" name="save_record" value="Save" class="btn btn-primary">Data List</button>
        </form>
    </div>

</body>

</html>