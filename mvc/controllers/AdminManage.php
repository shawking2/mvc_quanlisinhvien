<?php
class AdminManage extends Controller
{
    public $user;
    public $server;
    public function __construct()
    {
        $this->user = $this->model("UserModel");
        $this->server = $this->model("ServerModel");
        if (!isset($_SESSION['loggedin'])) {
            if ($_SESSION['loggedin'] == TRUE)
                header('Location: ' . '../Login');
        }
    }
    public function index()
    {
        # code...
    }
    public function Edit($id, $ip)
    {

        if (isset($_POST["buttonEdit"])) {
            $temp = $_SESSION['temp'];
            $result = $this->server->Update($_SESSION['temp_ip'], $_POST["ip"]);
            $result2 = $this->user->Update($_SESSION['temp_id'], $_POST["password"]);
            //$this->view("test", ["id" => $temp, "ip" => $_POST["ip"], "password" => $_POST['password']]);
            if ($result == true && $result2 == true) {
                header('location: ' . '/Home');
            } else if (isset($_POST['buttonCancel'])) {
                header('Location: ' . '/Home');
            } else {
                echo "Update error";
            }
        } else {
            $this->view("Layout", ["Page" => "Admin/LayoutEditServer", "id" => $id, "ip" => $ip]);
        }
    }
    public function Delete($id)
    {
        $result = $this->server->Delete($id);
        if ($result == TRUE) {
            header('location: ' . '/Home');
        } else {
            echo "Delete error";
        }
    }

    public function Add()
    {
        if (isset($_POST['buttonAdd'])) {
            $result1 = $this->user->Insert($_POST['username'], $_POST['password']);
            $temp_id = $this->user->GetId($_POST['username']);
            $result2 = $this->server->Insert($_POST['ip'], $temp_id, $_POST['date']);
            //$this->view("test", ["item1" => $_POST['username'], "item2" => $_POST['password'], "item3" => $temp_id, "item4" => $_POST['ip'], "item5" => $_POST['date']]);
            if ($result1 == TRUE && $result2 == TRUE) {
                header('location: ' . '../Home');
            } else {
                echo "Add error";
            }
        } else if (isset($_POST["buttonCancel"])) {
            header('location: ' . '../Home');
        } else {
            $this->view("Layout", ["Page" => "Admin/LayoutAdd"]);
        }
    }
    
    public function Scan($ip)
    {


        $command = '"C:\Program Files (x86)\Nmap\nmap.exe" -O ' . $ip;
        $exec = shell_exec($command);
        $this->view("Layout", ["Page" => "LayoutScan","info"=>str_replace("\n","</br>",$exec)]);
    }
    public function ScanAll()
    {
        if ($_SESSION['username'] == "admin") {
            $leakAll = $this->server->ListServer();
            $temp = "";
            while ($row = mysqli_fetch_array($leakAll)) {
                $temp = $temp . $row['ip'] . " ";
            }
            $command ='"C:\Program Files (x86)\Nmap\nmap.exe" -O ' . $temp;
            $exec = shell_exec($command);
            $this->view("Layout", ["Page" => "LayoutScan", "info" => str_replace("\n", "</br>", $exec)]);
        } else {
            $leak = $this->server->GetIpById($_SESSION['user_id']);
            $temp = "";
            while ($row = mysqli_fetch_array($leak)) {
                $temp = $temp . $row['ip'] . " ";
            }
            $command = '"C:\Program Files (x86)\Nmap\nmap.exe" -O ' . $temp;
            $exec = shell_exec($command);
            $this->view("Layout", ["Page" => "LayoutScan", "info" => str_replace("\n", "</br>", $exec)]);
        }
    }
}
