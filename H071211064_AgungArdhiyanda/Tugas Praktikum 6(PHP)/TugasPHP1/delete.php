<?php
require_once("dbcon.php");
$stmt = $conn->prepare("DELETE FROM student WHERE id = " . $_GET['id']);
$stmt->execute();
header("Location: index.php");
