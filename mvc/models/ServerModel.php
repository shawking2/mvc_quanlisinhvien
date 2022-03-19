<?php
    class ServerModel extends DataBase{
        public function GetIpById($id){
            $qr = "SELECT * FROM servers WHERE user_id = '$id'";
            $rs = (mysqli_query($this->con, $qr));
            return $rs;
        }
        public function ListServer(){
            $qr = "SELECT * FROM servers";
            $rs = (mysqli_query($this->con, $qr));
            return $rs;
        }
        public function Update($ip_old,$ip_new){
            $qr = "UPDATE servers SET ip = '$ip_new' WHERE ip='$ip_old'";
            $rs = (mysqli_query($this->con, $qr));
            return $rs;
        }
        public function Delete($ip){
            $qr = "DELETE FROM servers WHERE ip='$ip'";
            $rs = (mysqli_query($this->con, $qr));
            return $rs;
        }
        public function Insert($ip,$user_id,$date){
            $qr = "INSERT INTO servers(ip, user_id, date) VALUES ('$ip','$user_id','$date')";
            $rs = (mysqli_query($this->con, $qr));
            return $rs;
        }
        public function GetUserById($id){
            $qr = "SELECT DISTINCT users.username FROM `users`,`servers` WHERE servers.user_id = '$id' and users.id=servers.user_id";
            $rs = (mysqli_query($this->con, $qr));
            return $rs;
        }
        
        public function GetIp($id){
            $qr = "select * from server where id = '$id'";
            $rs = (mysqli_query($this->con, $qr));
            return $rs;
        }
    }
    
?>