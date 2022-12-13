<?php 

    
    require_once('../dasar/config.php');
    $db = new config();

    class insert extends config
    {
        // Insert Record in the Database
        public function getData()
        {
            global $db;
            if(isset($_POST['submit']))
            {
                $nama = $db->check($_POST['nama']);
                $nim = $db->check($_POST['nim']);
                $alamat = $db->check($_POST['alamat']);
                $fakultas = $db->check($_POST['fakultas']);
                if($nama&&$nim&&$alamat&&$fakultas){
                if($this->insert_record($nama,$nim,$alamat,$fakultas))
                {
                    echo '<div class="alert alert-success"> Your Record Has Been Saved :) </div>';
                }
            }else{
                echo '<div class="alert alert-warning"> Failed </div>';
            }
        }
            }
                
        

      // Insert Record in the Database Using Query    
        function insert_record($a,$b,$c,$d)
        {
            global $db;
            $query = "insert into mahasiswa values('','$a','$b','$c','$d')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public function readData(){
            global $db;
            $query1 ="select * from mahasiswa";
            $result1 = mysqli_query($db->connection,$query1);
            return $result1;


        }  public function update()
        {
            global $db;
            if(isset($_POST['update']))
            {
                $nama = $db->check($_POST['nama']);
                $nim = $db->check($_POST['nim']);
                $alamat = $db->check($_POST['alamat']);
                $fakultas = $db->check($_POST['fakultas']);
                if($nama&&$nim&&$alamat&&$fakultas){
                if($this->update_record($nama,$nim,$alamat,$fakultas))
                {
                    echo '<div class="alert alert-success"> Update success </div>';
                }
            }else{
                echo '<div class="alert alert-warning"> update Failed </div>';
            }
        }
            }
            function update_record($a,$b,$c,$d)
        {
            global $db;
            $query2 = "Update mahasiswa set Nama ='$a',Nim ='$b',alamat='$c',fakultas='$d' where Nim ='$b'";
            $result2 = mysqli_query($db->connection,$query2);

            if($result2)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public function registration()
        {
            global $db;
            if(isset($_POST['regis']))
            {
                $user = $db->check($_POST['username']);
                $email = $db->check($_POST['email']);
                $pass = $db->check($_POST['password']);
                if($user&&$email&&$pass){
                    try {
                        $this->regis_record($user,$email,$pass);
                        echo '<div class="alert alert-succes"> Regis is success </div>';
                        header("Location:http://localhost/dasar/praktikum7.php");
                    } catch (\Throwable $th) {
                        echo '<div class="alert alert-warning">Email or pass or username has been taken </div>';
                    }
                } else {
                    echo '<div class="alert alert-warning">Please fill all entry </div>';
                }
            }
        }
                
        

      // Insert Record in the Database Using Query    
        function regis_record($a,$b,$c)
        {
            global $db;
            $query = "insert into users values('$a','$b','$c')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public function login($username,$password){
            global $db;
            $result = mysqli_query($db->connection,"SELECT * FROM users WHERE username='$username' and passwor = '$password'");
            if($result->num_rows>0){
                $row = $result->fetch_array();
		        header('Location:http://localhost/dasar/praktikum7.php');

            }else{
                return false;
            }
        }
            public function escape_string($value){
                global $db;
                return $db->connection->real_escape_string($value);
            }
        }
    
      


    ?>