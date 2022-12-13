<?php
require_once("dbcon.php");
?>
<!DOCTYPE html>

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
    </title>
</head>

<body>
    <a href="add.php">Back To Input Data</a>
    <a href="index.php">Back To Home</a>

    <?php
    //Fetch Data
    $stmt = $conn->prepare("SELECT * FROM student");
    $stmt->execute();
    $result = $stmt->fetchAll();
    //show data
    echo "<table class='table table-striped table-hover table-bordered'>";
    echo "<thead class='table-dark'>";
    echo "<tr>";
    echo "<th>Student ID</th>";
    echo "<th>Student Name</th>";
    echo "<th>Student Address</th>";
    echo "<th>Student Faculty</th>";
    echo "<th>Action</th>";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    if (!empty($result)) {
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>
            <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
            <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
            </td>";
            echo "</tr>";
        }
    }
    ?>