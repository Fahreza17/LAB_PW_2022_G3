<?php
/*
require_once("dbcon.php");
$stmt = $conn->prepare("DELETE FROM student WHERE id = " . $_GET['id']);
$stmt->execute();
header("Location: delete.php");
*/
require 'function.php';
$delete = new delete();
$delete->deleteData($_GET['id']);
header("Location: showdata.php");
