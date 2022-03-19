<?php
class UserManage extends Controller
{
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
    }
    public function Edit($id, $ip)
    {

        if (isset($_POST["buttonEdit"])) {
            $result = $this->server->Update($_SESSION['temp_ip'], $_POST["ip"]);
            if ($result == true ) {
                header('location: ' . '/Home');
            } else if (isset($_POST['buttonCancel'])) {
                header('Location: ' . '/Home');
            } else {
                echo "Update error";
            }
        } else {
            $this->view("Layout", ["Page" => "User/LayoutEditUser", "id" => $id, "ip" => $ip]);
        }
    }
    public function Add()
    {
        if (isset($_POST['buttonAdd'])) {
            $result2 = $this->server->Insert($_POST['ip'], $_SESSION["user_id"], $_POST['date']);
            // $this->view("test", ["item1" => $_POST['ip'], "item2" => $_SESSION["user_id"], "item3" => $_POST['date']]);
            if ( $result2 == TRUE) {
                header('location: ' . '/Home');
            } else {
                echo "Add error";
            }
        } else if (isset($_POST["buttonCancel"])) {
            header('location: ' . '../Home');
        } else {
            $this->view("Layout", ["Page" => "User/LayoutAdd"]);
        }
    }
    public function Delete($ip)
    {
        
        //$this->view("test",["ip"=>$ip]);
        $result = $this->server->Delete($ip);
        if($result == TRUE){
            header('location: ' . '/Home');
        }else{
            echo "DELETE ERROR";
        }
    }
    public function Scan($ip)
    {
        $command = '"C:\Program Files (x86)\Nmap\nmap.exe" -O ' . $ip;
        $info = shell_exec($command);
        $this->view("Layout", ["Page" => "LayoutScan","info"=>str_replace("\n","</br>",$info)]);
    }
    public function Upload_file()
    {

        if (isset($_POST['buttonUpload'])) {
            if (isset($_FILES['file_name'])) {
                if ($_FILES['file_name']['error'] > 0) {
                    echo 'File Upload ERROR';
                } else {
                    $dir = 'upload/' . $_FILES['file_name']['name'];
                    move_uploaded_file($_FILES['file_name']['tmp_name'], $dir );
                
                    $path = 'upload/' . $_FILES['file_name']['name'];
                    // echo $path;
                    $fp = @fopen($path, "r");
                    
                    if (!$fp) {
                        echo "OPEN FILE ERROR!";
                    } else {
                        while (!feof($fp)) {
                            $date = date('m/d/Y h:i:s a', time());
                            $date = date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $date = date('Y-m-d H:i:s');
                            $rs = $this->server->insert(fgets($fp), $_SESSION['user_id'], $date);
                            if ($rs == FALSE) {
                                header('Location: ' . '/Home');
                            }
                        }
                        header('Location: ' . '/Home');
                    }
                }
            } else {
                echo 'file does not exist!';
            }
        }
    }
}
