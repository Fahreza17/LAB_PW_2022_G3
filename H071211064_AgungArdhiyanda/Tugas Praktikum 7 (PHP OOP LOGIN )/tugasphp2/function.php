<?php

session_start();

//Membuat objek koneksi
class connection
{
    public $dbhost = "localhost";
    public $dbuser = "root";
    public $dbpass = "";
    public $dbname = "testt";

    public function __construct()
    {
        //make a connection with pdo
        $this->conn = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
    }
}
//Membuat objek registrasi
class registration extends connection
{
    public function registration($username, $password)
    {
        $check = $this->conn->prepare("SELECT * FROM `user` WHERE username = :username");
        $check->bindParam(":username", $username);
        $check->execute();
        $result = $check->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return 10;
            //username telah diambil
        } else {
            $insert = $this->conn->prepare("INSERT INTO `user` (username, password) VALUES (:username, :password)");
            $insert->bindParam(":username", $username);
            $insert->bindParam(":password", $password);
            $insert->execute();
            return 1;
        }
    }
}


//Membuat objek login
class login extends connection
{
    public $id;
    public function login($username, $password)
    {
        $sql = "SELECT * FROM `user` WHERE `username` = :username AND `password` = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute(array(":username" => $username, ":password" => $password));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
        if ($stmt->rowCount() > 0) {
            return 1;
        } else {
            return 100;
        }
    }

    public function idUser()
    {
        return $this->id;
    }
}

//Membuat objek select
class select extends connection
{
    public function select($id)
    {
        $sql = "SELECT * FROM `user` WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}
class selectStudents extends connection
{
    public function select($id)
    {
        $sql = "SELECT * FROM `student` WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}

class addData extends connection
{
    public function addData($student_name, $address, $faculty)
    {
        $check = $this->conn->prepare("SELECT * FROM `student` WHERE student_name = :student_name");
        $check->bindParam(":student_name", $student_name);
        $check->execute();
        $result = $check->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return 10;
            //nama siswa telah ada
        } else {
            $insert = $this->conn->prepare("INSERT INTO `student` (student_name, address, faculty) VALUES (:student_name, :address, :faculty)");
            $insert->bindParam(":student_name", $student_name);
            $insert->bindParam(":address", $address);
            $insert->bindParam("faculty", $faculty);
            $insert->execute();
            return 1;
        }
    }
}
class delete extends connection
{
    public function deleteData($id)
    {
        $delete = $this->conn->prepare("DELETE FROM `student` WHERE id = :id");
        $delete->bindParam(":id", $id);
        $delete->execute();
        return 1;
    }
}
class update extends connection
{
    public function updateData($id, $student_name, $address, $faculty)
    {

        $check = $this->conn->prepare("SELECT * FROM `student` WHERE id = :id");
        $check->bindParam(":id", $id);
        $check->execute();
        $result = $check->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $update = $this->conn->prepare("UPDATE `student` SET student_name = :student_name, address = :address, faculty = :faculty WHERE id = :id");
            $update->bindParam(":id", $id);
            $update->bindParam(":student_name", $student_name);
            $update->bindParam(":address", $address);
            $update->bindParam(":faculty", $faculty);
            $update->execute();
            return 1;
        } else {
            return 10;
        }
    }
}
