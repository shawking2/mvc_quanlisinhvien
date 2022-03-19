<?php
    class UserModel extends DataBase{
        public function CheckLogin($username, $password)
        {
            $qr = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = false;
 
            $rs = (mysqli_query($this->con, $qr));
            $row = mysqli_num_rows($rs);
            if($row == 1)
            {
                $result = true;
            }
            return json_encode($result);
        }
        public function GetId($username){
            $qr = "SELECT id FROM users WHERE username = '$username'";
            $rs = (mysqli_query($this->con, $qr));
            while($row = mysqli_fetch_array($rs)){
                return $row["id"];
            }
        }
        public function ListUser()
        {
            $qr = "SELECT * FROM users";
            $rs = (mysqli_query($this->con, $qr));
            return $rs;
        }
        public function Insert($username,$password){
            $qr = "INSERT INTO users(username, password) VALUES ('$username','$password')";
            $rs = (mysqli_query($this->con, $qr));
            return $rs;
        }
        public function Update($id,$password){
            $qr = "UPDATE users SET password = '$password' WHERE id='$id'";
            $rs = (mysqli_query($this->con, $qr));
            return $rs;
        }
        public function GetUser($id){
            $qr = "SELECT * FROM users WHERE id = '$id'";
            $rs = (mysqli_query($this->con, $qr));
            return $rs;
        }
    }

?>