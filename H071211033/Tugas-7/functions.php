<?php
    
    class Connection {

        public $host = 'localhost';
        public $user = 'root';
        public $pass = '';
        public $db = 'produk';
        public $conn;

        public function __construct() {
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        }
    }
    
    class SignUp extends Connection {

        public function reg($username, $email, $password, $confirmPass) {
            $dup = mysqli_query($this->conn, "SELECT * FROM customers WHERE username = '$username' OR email = '$email'");

            if(mysqli_num_rows($dup) > 0) {
                return 10;
            } else {
                if($password == $confirmPass) {
                    $query = "INSERT INTO customers VALUES('', '$username', '$email', '$password')";
                    mysqli_query($this->conn, $query);

                    return 1;
                } else {
                    return 100;
                }
            }
        }
    }

    class SignIn extends Connection{

        public $id;
        public $username;

        public function log($email, $password) {
            $result = mysqli_query($this->conn, "SELECT * FROM customers WHERE email = '$email'");
            $row = mysqli_fetch_assoc($result);

            if(mysqli_num_rows($result) > 0) {
                if($password == $row['password']) {
                    $this->id = $row['customer_id'];

                    return 1;
                } else {
                    return 10;
                }
            } else {
                return 100;
            }
        }

        public function idUser() {
            return $this->id;
        }

        // public function username() {
        //     $this->username = $row['username'];

        //     return $this->username;
        // }
    }

    class Select extends Connection {

        public function byId($id) {
            $result = mysqli_query($this->conn, "SELECT * FROM customers WHERE customer_id = $id");

            return mysqli_fetch_assoc($result);
        }

        public function user($id) {
            $result = mysqli_query($this->conn, "SELECT username FROM customers WHERE customer_id = $id");

            return mysqli_fetch_assoc($result);
        }
    }

    class Query extends Connection {
        
        public function qSelect($query) {
            $result = mysqli_query($this->conn, $query);
            $rows = [];
    
            while ($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;
            };
    
            return $rows;
        }

        public function qInsert($post) {
            $kode = htmlspecialchars($post['kode']);
            $nama = htmlspecialchars($post['nama']);
            $jenis = htmlspecialchars($post['jenis']);
            $query = "INSERT INTO senjata VALUES ('$kode', '$nama', '$jenis')";
    
            mysqli_query($this->conn, $query);
    
            return mysqli_affected_rows($this->conn);
        }

        public function qDelete($kode) {
            mysqli_query($this->conn, "DELETE FROM senjata WHERE kode = '$kode'");
    
            return mysqli_affected_rows($this->conn);
        }

        public function qUpdate($kode) {
            $kode = ($_GET['kode']);
            $nama = htmlspecialchars($_POST['nama']);
            $jenis = htmlspecialchars($_POST['jenis']);
            $query = "UPDATE senjata SET nama = '$nama', jenis = '$jenis' WHERE kode = '$kode'";
    
            mysqli_query($this->conn, $query);
    
            return mysqli_affected_rows($this->conn);
        }

        public function dup($post) {
            $kode = htmlspecialchars($post['kode']);
            $nama = htmlspecialchars($post['nama']);
            $qKode = "SELECT kode FROM senjata WHERE kode = '$kode'";
            $qNama = "SELECT nama FROM senjata WHERE nama = '$nama'";
            $qK = mysqli_query($this->conn, $qKode);
            $qN = mysqli_query($this->conn, $qNama);
    
            if(mysqli_num_rows($qK) > 0 || mysqli_num_rows($qN) > 0) {
                return true;
            } else {
                return false;
            };
        }
    }
    // $test = new Query();
?>