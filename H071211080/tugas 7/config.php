<?php 
    session_start();
    require_once('../dasar/insert.php');

    class config
    {
        public $connection;

        public function __construct()
        {
            $this->connect();
        }
       
        public function connect()
        {
            $this->connection = mysqli_connect('localhost','root','','praktikum');
            if(mysqli_connect_error())
            {
                die(" Connect Failed ");
            }
        }

        public function check($a)
        {
            $return = mysqli_real_escape_string($this->connection,$a);
            return $return;
        }
    }
?>