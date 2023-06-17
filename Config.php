<?php
    class Config {
        private $HOST = "127.0.0.1";
        private $USERNAME = "root";
        private $PASSWORD = "";
        private $DBNAME = "php";
        public $conn;

        public function __construct() {
            $this->conn = mysqli_connect($this->HOST,$this->USERNAME,$this->PASSWORD,$this->DBNAME);

            if($this->conn) {
                print "Conection Successfully !!";
            } else {
                print "Connection Failled !!";
            }
        }

        public function insert($name,$age,$course) {
            $query = "INSERT INTO student (name,age,course) VALUES('$name',$age,'$course')";

            $res = mysqli_query($this->conn,$query);

            if($res) {
                print "Insertion Successfully !!";
            } else {
                print "Insertion Failled !!";
            }
        }

        public function fetch_all_data() {
            $query = "SELECT * FROM student";

            $res = mysqli_query($this->conn,$query);
            
            return $res;
        }

    };
?>