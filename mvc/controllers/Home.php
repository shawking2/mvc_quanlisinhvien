<?php


class Home extends Controller
{
    public $user;
    public $server;
    public function __construct()
    {
        $this->user = $this->model("UserModel");
        $this->server = $this->model("ServerModel");
    }
    function index()
    {
        if (isset($_SESSION['loggedin'])) {
            if ($_SESSION['loggedin'] == true) {
                $array = [];
                if ($_SESSION['username'] == 'admin') {
                    $id = $this->user->ListUser();
                    $ip = $this->server->ListServer();
                    $arr_username = [];
                    while ($getUserById = mysqli_fetch_array($ip)) {
                        $temp = $this->server->GetUserById($getUserById['user_id']);
                        while ($getUsername = mysqli_fetch_array($temp)) {
                            array_push($arr_username, $getUsername['username']);
                        }
                    }
                    
                    $this->view("Layout", ["Page"=>"LayoutAdmin","username" => $arr_username, "ip" => $this->server->ListServer(),]);
                } else {
                    $this->view("Layout",["Page"=>"LayoutUser","ip"=>$this->server->GetIpById($_SESSION['user_id']),"user"=>$this->server->GetUserById($_SESSION['user_id'])]);
                }
            } else {
                echo "loggedin is false";
            }
        } else {
            header('Location: ' . '/Login');
        }
    }
    public function Logout(){
        session_destroy();
        header('location: ' . '/Login');
    }
}
