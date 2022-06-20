<?php

    Class Model{
        private $server = 'localhost';
        private $username = 'root';
        private $password;
        private $db = 'user_management';
        private $conn;

        public function __construct()
        {
            try{
                $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
            }catch(Exception $exception){
                echo "Connection failed ". $exception->getMessage();
            }
        }

        public function insert(){
            if(isset($_POST['submit'])){
                if(isset($_POST['name']) && isset($_POST['phone']) 
                && isset($_POST['email']) && isset($_POST['address'])){
                    if(!empty($_POST['name'])&& !empty($_POST['phone']) 
                    && !empty($_POST['email']) && !empty($_POST['address'])){
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];

                        $query = "INSERT INTO users (name,phone,email,address) 
                        VALUES ('$name', '$phone', '$email', '$address')";
                        if($sql = $this->conn->query($query)){
                            echo "<script>alert('User has been successfully added.')</script>";
                            echo "<script>window.location.href = 'list.php';</script>";
                        }else{
                            echo "<script>alert('Sorry try again later.')</script>";
                            echo "<script>window.location.href = 'index.php';</script>";
                        }
                    }else{
                        echo "<script>alert('empty')</script>";
                    }
                }
            }
        }

        public function getAllData(){
            $data = null;
            $query = "SELECT * FROM users";
            if($sql = $this->conn->query($query)){
                while ($row = mysqli_fetch_assoc($sql)){
                    $data[] = $row;
                } 
            }

            return $data;
        }

        public function edit($id)
        {
            $data = null;
            $query = "SELECT * FROM users WHERE id = '$id'";
            if($sql = $this->conn->query($query)){
                while ($row = mysqli_fetch_assoc($sql)){
                    $data = $row;
                } 
            }

            return $data;
        }

        public function update($data)
        {
            $update = "UPDATE users SET name='$data[name]', email='$data[email]', phone='$data[phone]', address='$data[address]' WHERE id='$data[id]'";
            if($this->conn->query($update)){
                return true;
            }else{
                return false;
            }
        }

        public function delete($id)
        {
            $query = "DELETE FROM users WHERE id='$id'";

            if($this->conn->query($query)){
                return true;
            }else{
                return false;
            }
        }
    }

?>